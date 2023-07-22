<?php
	/**
	 * Classe métier représentant un article
	 */
	class Article
	{
		public $id;
		public $titre;
		public $contenu;
		public $categorie;
		public $dateCreation;
		public $dateModification;

		// private $bdd;

		// public function __construct()
		// {
		// 	$this->bdd = ConnexionManager::getInstance();
		// }

		public static function getList()
		{
			$bdd = ConnexionManager::getInstance();
			$data = $bdd->query('SELECT * FROM article');
			$articles = $data->fetchAll(PDO::FETCH_CLASS, 'article');
			$data->closeCursor();
			return $articles;
		}

		public static function getById($id)
		{
			$bdd = ConnexionManager::getInstance();
			$data = $bdd->query('SELECT * FROM article WHERE id = '.$id);
			$article = $data->fetch(PDO::FETCH_OBJ);
			$data->closeCursor();
			return $article; 
		}

		public static function getByCategoryId($id)
		{
			$bdd = ConnexionManager::getInstance();
			$data = $bdd->query('SELECT * FROM article WHERE categorie = '.$id);
			$articles = $data->fetchAll(PDO::FETCH_CLASS, 'article');
			$data->closeCursor();
			return $articles;
		}
	}
?>