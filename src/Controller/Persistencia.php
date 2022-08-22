<?php

namespace FiecCrudPhp\Controller;

use FiecCrudPhp\Entity\Cliente;
use FiecCrudPhp\Helper\FlashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Persistencia implements RequestHandlerInterface
{
    use FlashMessageTrait;

    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $nome = filter_var($request->getParsedBody()['nome'],FILTER_SANITIZE_STRING);
        $sobreNome = filter_var($request->getParsedBody()['sobreNome'],FILTER_SANITIZE_STRING);
        $email = filter_var($request->getParsedBody()['email'],FILTER_SANITIZE_STRING);

        $cliente = new Cliente();
        $cliente->setNome($nome);
        $cliente->setSobreNome($sobreNome);
        $cliente->setEmail($email);

        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        $tipo = 'success';
        if (!is_null($id) && $id !== false) {
            $cliente->setId($id);
            $this->entityManager->merge($cliente);
            $this->defineMensagem($tipo, 'Cliente atualizado com sucesso');
        } else {
            $this->entityManager->persist($cliente);
            $this->defineMensagem($tipo, 'Cliente inserido com sucesso');
        }

        $this->entityManager->flush();

        return new Response(302, ['Location' => '/']);
    }
}
