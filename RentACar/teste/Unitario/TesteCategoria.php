<?php
    namespace Teste\Unitario;
    
    use \Teste\Teste;
    use \Modelo\Categoria;

    class TesteCategoria extends Teste
    {
        public function testeBuscarTodos()
        {
            $categorias = Categoria::buscarTodos();
            $this->verificar(($categorias != null) && (count($categorias) == 4));
        }

        public function testeBuscarId()
        {
            $categoria = Categoria::buscarId(1);
            $this->verificar($categoria->getNome() == 'Hatch');
        }
      
    }
?>