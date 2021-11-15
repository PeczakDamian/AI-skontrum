<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <style>
        body {
            display: flex;
            justify-content: center;
        }
    </style> -->
</head>
<body>

    <?php

        $tabRows = array();
        $tabCols = array();
        $tabCols = array_fill(0, 20, array(
            "id" => "",
            "pos" => ""
        ));
        $tabRows = array_fill(0, 50, $tabCols);

        $state = array(
            "UB" => array(
                "name" => "Wykreślone",
                "items" => array()
            ),
            "UC" => array(
                "name" => "U czytelnika",
                "items" => array()
            ),
            "WB" => array(
                "name" => "W bibliotece",
                "items" => array()
            ),
            "UI" => array(
                "name" => "U introligatora",
                "items" => array()
            ),
            "OK" => array(
                "name" => "Na półkach",
                "items" => array()
            ),
            "NO" => array(
                "name" => "Brak",
                "items" => array()
            )
        );

        $no = 0;
        echo "<TABLE border='1'>";
        echo "<TD rowspan='51'></TD>";
        foreach ($tabRows as $i => $v1) {
            echo "<TR>";
            $it = 0;
            $no = $i + 1;
            foreach ($tabRows[$i] as $j => $v2) {

                $tabRows[$i][$j]["id"] = sprintf("%'.03d\n", $no);
                $of = array_rand($state, 1);
                $tabRows[$i][$j]["pos"] = $of;

                array_push($state[$of]["items"], $j);

                echo "<TD>"
                .$tabRows[$i][$j]["id"]."\n"
                .$tabRows[$i][$j]["pos"].
                "</TD>";
                $no += 50;
            }
            $it += 1;
            echo "</TR>";
        }
        // var_dump($state["UB"]["items"]);
        // var_dump($state["UB"]["items"][0]);
        // var_dump(enum($state["UB"]["items"], 0));
        foreach ($state as $key => $value) {
            // var_dump($state[$key]["items"]);
            if ($key === "UB") {
                echo "<TR><TD>".$value["name"]." (".$key.")"."</TD>";
                    for ($i=0; $i < 20; $i++) {
                        echo "<TD>".enum($state[$key]["items"], $i)."</TD>";
                    }
                echo "<TD>".count($value["items"])."</TD></TR>";
            } elseif ($key === "UC") {
                echo "<TR><TD>".$value["name"]." (".$key.")"."</TD>";
                    for ($i=0; $i < 20; $i++) {
                        echo "<TD>".enum($state[$key]["items"], $i)."</TD>";
                    }
                echo "<TD>".count($value["items"])."</TD></TR>";
            } elseif ($key === "WB") {
                echo "<TR><TD>".$value["name"]." (".$key.")"."</TD>";
                    for ($i=0; $i < 20; $i++) {
                        echo "<TD>".enum($state[$key]["items"], $i)."</TD>";
                    }
                echo "<TD>".count($value["items"])."</TD></TR>";
            } elseif ($key === "UI") {
                echo "<TR><TD>".$value["name"]." (".$key.")"."</TD>";
                    for ($i=0; $i < 20; $i++) {
                        echo "<TD>".enum($state[$key]["items"], $i)."</TD>";
                    }
                echo "<TD>".count($value["items"])."</TD></TR>";
            } elseif ($key === "OK") {
                echo "<TR><TD>".$value["name"]." (".$key.")"."</TD>";
                    for ($i=0; $i < 20; $i++) {
                        echo "<TD>".enum($state[$key]["items"], $i)."</TD>";
                    }
                echo "<TD>".count($value["items"])."</TD></TR>";
            } elseif ($key === "NO") {
                echo "<TR><TD>".$value["name"]." (".$key.")"."</TD>";
                    for ($i=0; $i < 20; $i++) {
                        echo "<TD>".enum($state[$key]["items"], $i)."</TD>";
                    }
                echo "<TD>".count($value["items"])."</TD></TR>";
            }
        }
        suma($state, $tabRows);
        echo "</TABLE>";

        function enum($what, $column) {
            $x = 0;
            for ($i=0; $i < count($what); $i++) { 
                if ($what[$i] === $column) {
                    $x++;
                    // var_dump($x);
                }
            }
            return $x;
        }

        function suma($state, $tabRows) {
            $u = 0;
            $y = 0;
            echo "<TR><TD>SUMA</TD>";
            foreach ($state as $key => $value) {
                $u += count($value["items"]);
            }
            for ($i=0; $i < 20; $i++) { 
                echo "<TD>";
                foreach ($state as $key => $value) {
                    $y += enum($state[$key]["items"], $i);
                }
                echo $y."</TD>";
                $y = 0;
            }
            echo "<TD>".$u."</TD>";
            echo "</TR>";
        }
    ?>

</body>

</html>