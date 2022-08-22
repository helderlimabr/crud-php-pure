<?php

namespace FiecCrudPhp\Controller;

use FiecCrudPhp\Helper\RenderizadorDeHtmlTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioInsercao implements RequestHandlerInterface
{
    use RenderizadorDeHtmlTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizaHtml('clientes/formulario.php', [
            'titulo' => 'Novo Cliente'
        ]);
        return new Response(200, [], $html);
    }
}
