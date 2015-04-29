<?php
/**
 * Created by PhpStorm.
 * User: steph
 * Date: 29/04/15
 * Time: 09:48
 */

class menu {

    private $id;
    private $name;



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    function afficher_menu($parent, $niveau, $liste_menu) {

        $html = "";
        $niveau_precedent = 0;

        if (!$niveau && !$niveau_precedent) $html .= "\n<ul>\n";

        foreach ($liste_menu AS $menu) {

            if ($parent == $menu['parent_id']) {

                if ($niveau_precedent < $niveau) $html .= "\n<ul>\n";

                $html .= "<li>" . $menu['name'];

                $niveau_precedent = $niveau;

                $html .= $this->afficher_menu($menu['id'], ($niveau + 1), $liste_menu);

            }
        }

        if (($niveau_precedent == $niveau) && ($niveau_precedent != 0)) $html .= "</ul>\n</li>\n";
        else if ($niveau_precedent == $niveau) $html .= "</ul>\n";
        else $html .= "</li>\n";

        return $html;

    }


} 