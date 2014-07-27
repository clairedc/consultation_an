<div class='row' style="margin-top: 60px;">
<div class="col-md-6 col-md-offset-3">
<?php include(__DIR__.'/declarationimg.php');  ?>
  <?php if ($numerisations) :
  $exceptions = array(
    '"NEANT"' => "NÉANT",
    '"PB #1"' => "ILLISIBLE",
    '"PB #2"' => "MAUVAIS SCAN",
    '"PB #3"' => "INCOMPLET",
  );?>
  <div id="numerisations"></div>
  <div class="well numerisations">
    <div class="media text-center">
      <h3 class="page-header text-muted">Numérisations</h3>
        <table>
        <?php
        $numcol = 1;
        foreach($numerisations as $num) {
          if (substr($num["data"], 0, 1) == "[") {
            $data = json_decode($num['data']);
            $numcol = count($data[0]);
            break;
          }
        }
        foreach($numerisations as $num) {
          if (isset($exceptions[$num["data"]])) {
            echo '<tr><td colspan="'.$numcol.'">'.$exceptions[$num["data"]].'</td><tr>';
          } else {
            foreach(json_decode($num['data']) as $row) {
              echo '<tr>';
              foreach($row as $case) {
                echo '<td>'.$case.'</td>';
              }
              echo '</tr>';
            }
          }
          echo '</tr>';
          echo '<tr class="auteur"><td colspan="'.$numcol.'">'.$num["nickname"]." &mdash; ".$num["created_at"]."</td></tr>";
        } ?>
        </table>
    </div>
  </div>
  <?php endif ?>
</div>
</div>
