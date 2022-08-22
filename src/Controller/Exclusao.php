<?php

namespace FiecCrudPhp\Controller;

use FiecCrudPhp\Entity\Cliente;
use FiecCrudPhp\Helper\FlashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Exclusao implements RequestHandlerInterface
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
        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        $resposta = new Response(302, ['Location' => '/']);
        if (is_null($id) || $id === false) {
            $this->defineMensagem('danger', 'Cliente inexistente');
            return $resposta;
        }

        $cliente = $this->entityManager->getReference(
            Cliente::class,
            $id
        );
        $this->entityManager->remove($cliente);
        $this->entityManager->flush();
        $this->defineMensagem('success', 'Cliente excluído com sucesso');

        return $resposta;
    }
}
