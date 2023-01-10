<?php

namespace App\Utils;

class Slugify
{
    public static function generate($title, \PDO $connection, $tableName): string
    {
        $slug = "";
        $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($title)));
        $statement = $connection->prepare("SELECT slug FROM $tableName WHERE slug LIKE '$slug%'");
        
        if ($statement->execute()) {
            $row = $statement->rowCount();

            if ($row > 0) {
                $results = $statement->fetchAll();

                foreach ($results as $row) {
                    $data[] = $row["slug"];
                }

                if (in_array($slug, $data)) {
                    $count = 0;

                    while (in_array(($slug . "-" . ++$count), $data));
                    $slug = $slug . "-" . $count;
                }
            }
        }

        return $slug;
    }
}
