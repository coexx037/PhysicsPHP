<?php require_once("../resources/functions.php"); ?>
<?php include("../resources/session.php"); ?>

<div class="row">
    <?php include(TEMPLATE_FRONT.DS."header.php") ?>
</div>


    
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12 sol-xs-12 text-left">
                <div class="well">
                    <h1>Block on an inclined plane</h1>
                <form action="receiver.php" method="POST" class="ajax">
                    <table class="table">
                        <thead>
                              <tr>
                                <th class="text-center">Direction</th>
                                <th class="text-center">Solve For</th> 
                                <th class="text-center">Solve Units</th> 
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                 <td class="text-center">
                                 <select name="direction">
                                    <option>+</option>
                                    <option>-</option>
                                    <option>s</option>
                                </select>  
                                </td>
                                <td class="text-center"><select id="solve_data" name="solve_data"></select></td>
                                <td class="text-center"><select id="solve_units" name="solve_units"></select></td>
                              </tr>
                          </tbody>
                    </table>
                    <table class="table text-center" id="data" style="width:100%">
                          <thead>
                              <tr>
                                <th class="text-center">Variable</th>
                                <th class="text-center">Value</th> 
                                <th class="text-center">Units</th> 
                              </tr>
                          </thead>
                          <tbody id="tbd" name="tbd">
                          </tbody>
                    </table>
                    <input type="submit" class="btn btn-primary" id='get-button' value="Solve">
                </form> 
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 sol-xs-12">
                <canvas id="canvas" width="500" height="300" style="border:1px solid #000000;"></canvas> <br>
                <div id="name_data"></div>
            </div>

    </div>
    </div>
        
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paper.js/0.11.3/paper-full.min.js"></script>
    <script type="text/paperscript" canvas="canvas" src="js/methods.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    
    

</HTML>





