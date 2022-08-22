<?php

namespace FiecCrudPhp\Controller;

use FiecCrudPhp\Entity\Cliente;
use FiecCrudPhp\Helper\FlashMessageTrait;
use FiecCrudPhp\Helper\RenderizadorDeHtmlTrait;
use FiecCrudPhp\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioEdicao implements RequestHandlerInterface
{
    use RenderizadorDeHtmlTrait, FlashMessageTrait;

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    private $repositorioClientes;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioClientes = $entityManager
            ->getRepository(Cliente::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        $resposta = new Response(302, ['Location' => '/']);
        if (is_null($id) || $id === false) {
            $this->defineMensagem('danger', 'Cliente inválido');
            return $resposta;
        }

        $cliente = $this->repositorioClientes->find($id);

        $html = $this->renderizaHtml('clientes/formulario.php', [
            'cliente' => $cliente,
            'titulo' => 'Alterar Cliente ' . $cliente->getNome(),
        ]);

        return new Response(200, [], $html);
    }
}
