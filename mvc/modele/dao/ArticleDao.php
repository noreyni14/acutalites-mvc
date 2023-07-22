<?php
    require_once 'ConnexionManager.php';
	/**
	 * Classe métier représentant un article
	 */
	class ArticleDao
	{
		/* public $id;
		public $titre;
		public $contenu;
		public $categorie;
		public $dateCreation;
		public $dateModification; */

		private $bdd;

		 public function __construct()
		{
			$this->bdd = ConnexionManager::getInstance();
		}

		public  function getList()
		{
			$data = $this->bdd->query('SELECT * FROM article');
            return $data->fetchAll(PDO::FETCH_CLASS, 'article');

		}

		public function getById($id)
		{
			$data = $this->bdd->query('SELECT * FROM article WHERE id = '.$id);
			return $data->fetch(PDO::FETCH_OBJ);
			
		}

		public  function getByCategoryId($id)
		{
			
			$data = $this->bdd->query('SELECT * FROM article WHERE categorie = '.$id);
			return $data->fetchAll(PDO::FETCH_CLASS, 'article');
			
		}
	}
?>