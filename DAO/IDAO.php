<?php

	interface IDAO {
		public function adicionar();
		public function selecionar();
		public function excluir();
		public function listar($start, $limit);
		public function verificar();
		public function alterar();
	}