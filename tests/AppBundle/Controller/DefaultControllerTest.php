<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use WebsiteBundle\Services\SlackApi;

class DefaultControllerTest extends WebTestCase
{

    protected static $services;
    protected static $container;

    public static function setUpBeforeClass()
    {
        self::bootKernel();
        self::$container = self::$kernel->getContainer();
    }

    protected function getService($name)
    {
        if (isset(self::$services[$name])) {
            return self::$services[$name];
        } else {
            return self::$services[$name] = self::$container->get($name);
        }
    }

    /*public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Welcome to Symfony', $crawler->filter('#container h1')->text());
    }*/

    public function testSlackApi()
    {
        #$api = new SlackApi();
        $api = $this->getService('app.slack_api');
        $send = $api->enviaMensagem('Teste v1.wtis.local', 'financeiro');
        $this->assertEquals('ok', $send);
        dump($send);
        /*$this->expectOutputString('blabla');
        print "blabla";*/
    }

    public function testSlackApiOtherChannel()
    {
        #$api = new SlackApi();
        $api = $this->getService('app.slack_api');
        $send = $api->enviaMensagem('Teste v1.wtis.local financeiro', 'financeiro');
        $this->assertEquals('ok', $send);
        dump($send);
        /*$this->expectOutputString('blabla');
        print "blabla";*/
    }

    public function testSlackFormat1()
    {
        $data = <<<EOF
{
    "text": "Would you like to play a game?",
    "attachments": [
        {
            "text": "Choose a game to play",
            "fallback": "You are unable to choose a game",
            "callback_id": "wopr_game",
            "color": "#3AA3E3",
            "attachment_type": "default",
            "actions": [
                {
                    "name": "game",
                    "text": "Chess",
                    "type": "button",
                    "value": "chess"
                },
                {
                    "name": "game",
                    "text": "Falken's Maze",
                    "type": "button",
                    "value": "maze"
                },
                {
                    "name": "game",
                    "text": "Thermonuclear War",
                    "style": "danger",
                    "type": "button",
                    "value": "war",
                    "confirm": {
                        "title": "Are you sure?",
                        "text": "Wouldn't you prefer a good game of chess?",
                        "ok_text": "Yes",
                        "dismiss_text": "No"
                    }
                }
            ]
        }
    ]
}
EOF;

        $api = $this->getService('app.slack_api');
        $send = $api->enviaMensagem($data, 'financeiro', false);
        $this->assertEquals('ok', $send);
        dump($send);
    }

    public function testContatoAction()
    {

        $slackMsg = array(
            "username" => "robovendas",
            "attachments" => [
                [
                    'pretext' => '*UM NOVO CONTATO SOLICITOU UMA LIGAÇÃO*',
                    "title" => "João Alencar",
                    'text' => "E-mail: *joao@gmail.com*\nTelefone: *(38) 9 9897 1395*",
                    "thumb_url" => "https://www.wtis.com.br/images/slack/1.png",
                    "thumb_url" => "https://www.wtis.com.br/images/slack/1.png",
                    "mrkdwn_in" => [
                        "text",
                        "pretext"
                    ]
                ]
            ]
        );
        dump(json_encode($slackMsg));
        $api = $this->getService('app.slack_api');
        $send = $api->enviaMensagem(json_encode($slackMsg), 'financeiro', false);
        $this->assertEquals('ok', $send);
        dump($send);
    }

    public function testMauticCriaContato(){
        $mapi = $this->getService('app.marketing_api');
        $contato = $mapi->criaContato($data = array(
            'firstname' => 'Teste Wtis Site Edit',
            'email'     => 'tiagomovel@gmail.com',
            'ipAddress' => isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '',
            ''
        ));
        #dump($contato);
        $this->assertArrayHasKey('contact', $contato);
    }

    public function testListaContatos(){
        $mapi = $this->getService('app.marketing_api');
        $lista = $mapi->listaContatos('tiagomovel@gmail.com');
        dump(array_shift($lista['contacts']));
        $this->assertArrayHasKey('total', $lista);
        if(isset($lista['contacts'][0])){
            $this->assertArrayHasKey('id', $lista[0]);
        }
    }

    public function testMauticUpdate(){
        $mapi = $this->getService('app.marketing_api');
        //Verifica se o contato já existe
        $lista = $mapi->listaContatos('tiagomovel@gmail.com');
        dump($lista);
        $this->assertTrue(true);
        $acao = 'novo';
        if( isset($lista['contacts']) && count(@$lista['contacts'])>0){
            //Existe
            $contato = array();
            $contato['contact'] = array_shift($lista['contacts']); //retira o primeiro elemento do array. Como estamos buscando diretamente pelo e-mail, a probabilidade de dois contatos é bem baixa.
            $acao = 'update';
        } else{
            //Não existe
            $contato = $mapi->criaContato($data);
        }

        if (isset($contato['contact'])) {
            $contactid = $contato['contact']['id'];

            if($acao=='novo'){
                //Envia e-mail de auto-resposta do contato qualificado
                $mapi->enviaEmail(11, $contactid);
            } else{
                $mapi->enviaEmail(12, $contactid);
            }

            $contactProdutosInteresse = isset($contato['contact']['produtos_de_interesse']) ? $contato['contact']['produtos_de_interesse'] : '';
            $contactProdutosInteresseNew = $produtoInteresse . ',';
            $contactProdutosInteresse = str_replace($contactProdutosInteresseNew, '', $contactProdutosInteresse);
            $contactProdutosInteresse .= $contactProdutosInteresseNew;
            $contato = $mapi->atualizaContato($contactid, $data = array_merge($data, array(
                'produtos_de_interesse' => $contactProdutosInteresse,
                'ipAddress' => isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '',
            )), false);

            //Adiciona o contato ao segmento padrão
            $mapi->adicionaContatoSeguimento(7, $contactid);
        }
    }
}
