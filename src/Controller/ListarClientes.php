<?php

namespace FiecCrudPhp\Controller;

use FiecCrudPhp\Entity\Cliente;
use FiecCrudPhp\Helper\RenderizadorDeHtmlTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ListarClientes implements RequestHandlerInterface
{
    use RenderizadorDeHtmlTrait;

    private $repositorioDeClientes;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeClientes = $entityManager
            ->getRepository(Cliente::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizaHtml('clientes/listar-clientes.php', [
            'clientes' => $this->repositorioDeClientes->findAll(),
            'titulo' => 'Lista de Clientes',
        ]);

        return new Response(200, [], $html);
    }
}
