<?php 

require_once("../resources/functions.php");


?>

<?php include(TEMPLATE_FRONT.DS."header.php") ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

    <div class='container'>
        <header class='jumbotron'>
                <h1>Welcome to Solve Physics!</h1>
        </header>
                <div class="col-lg-6 col-md-6 col-sm-6 sol-xs-12">
                <p>Directions:</p>
                <ul>
                    <li>Select the assumed direction of the block [(+) positive, (-) negative, (s) static].</li>
                    <li>Select the variable to solve for.</li>
                    <li>Select the units to solve for.</li>
                    <li>Enter input values.</li>
                    <li>Click solve.</li>
                </ul>                <p>
                <a class='btn btn-primary btn-large' href="/block.php">Go to Solver</a>
                </p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 sol-xs-12">
                    <table class="table text-left" id="data" style="width:100%">
                      <tr>
                        <th class="text-left">Variable</th>
                        <th class="text-left">Definition</th> 
                      </tr>
                      <tr>
                          <td>g</td>
                          <td>Gravity (9.8 m/s2)</td>
                      </tr>
                      <tr>
                          <td>Fnet</td>
                          <td>Net Force</td>
                      </tr>
                      <tr>
                          <td>a</td>
                          <td>Acceleration</td>
                      </tr>
                      <tr>
                          <td>theta</td>
                          <td>Angle of inclined plane</td>
                      </tr>
                      <tr>
                          <td>m1</td>
                          <td>Mass of block 1</td>
                      </tr>
                      <tr>
                          <td>m2</td>
                          <td>Mass of block 2</td>
                      </tr>
                      <tr>
                          <td>muk</td>
                          <td>Coefficient of kinetic friction</td>
                      </tr>
                      <tr>
                          <td>mus</td>
                          <td>Coefficient of static friction</td>
                      </tr>
                      <tr>
                          <td>V0</td>
                          <td>Initial velocity</td>
                      </tr>
                      <tr>
                          <td>Vf</td>
                          <td>Final velocity</td>
                      </tr>
                      <tr>
                          <td>d</td>
                          <td>Distance that block travels</td>
                      </tr>
                    </table>
            </div>
        


</div>

        </div>

    </div>
    <!-- /.container -->

    
<?php include(TEMPLATE_FRONT.DS."footer.php") ?>