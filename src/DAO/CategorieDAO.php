<?php

namespace MyMovies\DAO;

use MyMovies\Domain\Categorie;

class CategorieDAO extends DAO
{
    /**
     * Renvoie la liste de toutes les catégories, triées par nom
     *
     * @return array La liste de toutes les catégories
     */
    public function findAll() {
        $sql = "select * from categorie order by cat_name";
        $result = $this->getDb()->fetchAll($sql);
        
        // Convertit les résultats de requête en tableau d'objets du domaine
        $categories = array();
        foreach ($result as $row) {
            $categorieId = $row['cat_id'];
            $categories[$categorieId] = $this->buildDomainObject($row);
        }
        return $familles;
    }

    /**
     * Renvoie une catégorie à partir de son identifiant
     *
     * @param integer $id L'identifiant de la catégorie
     *
     * @return \MyMovies-kvari\Domain\Categorie|Lève un exception si aucune famille ne correspond
     */
    public function find($id) {
        $sql = "select * from categorie where cat_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("Aucune catégorie ne correspond à l'identifiant " . $id);
    }

    /**
     * Crée un objet Categorie à partir d'une ligne de résultat BD
     *
     * @param array $row La ligne de résultat BD
     *
     * @return \MyMovies-kvari\Domain\Categorie
     */
    protected function buildDomainObject($row) {
        $categorie = new Categorie();
        $categorie->setId($row['cat_id']);
        $categorie->setName($row['cat_name']);
        return $categorie;
    }
}