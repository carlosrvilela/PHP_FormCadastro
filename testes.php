<?php
    use \Loja\Usuario;
    use \Loja\Contato;
    require 'Usuario.php';
    require 'Contato.php';

    function testContato()
    {
        $contato = new Contato('');
        print($contato->getNomeUsuario());
    }

    //tesUsuario();
    testContato();


    function tesUsuario()
    {
        $usuario = new Usuario('');
        print("\n\n\n".$usuario->getNome());
    }

    

?>