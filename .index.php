<!DOCTYPE HTML>

<html>
	<head>
		<title>Sinacig</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="//10.10.20.144/sinacig/.assets/css/main.css" />
		<link rel="stylesheet" href="//10.10.20.144/sinacig/.style.css">
		<script src="//10.10.20.144/sinacig/.sorttable.js"></script>
		

	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<img src="//10.10.20.144/sinacig/.images/" width="100%" height="auto" alt="Logo SGC">
								</header>

							
							<!-- Section -->
								<div class="content">
											<div class="container">
											  <div class="table-responsive custom-table-responsive">
												<table class="table custom-table">
												  <thead>
													<tr>  
													  
													  <th scope="col">Nombre del documento</th>
													  <th scope="col">Tipo</th>
													  <th scope="col">Tamaño (bytes)</th>
													  <th scope="col">Fecha de modificación</th>
										
													</tr>
												  </thead>
												  <?php
        // Opens directory
        $myDirectory=opendir(".");
        
        // Gets each entry
        while($entryName=readdir($myDirectory)) {
          $dirArray[]=$entryName;
        }
        
        // Finds extensions of files
        function findexts ($filename) {
          $filename=strtolower($filename);
          $exts= preg_split("[/\\.]", $filename);
          $n=count($exts)-1;
          $exts=$exts[$n];
          return $exts;
        }
        
        // Closes directory
        closedir($myDirectory);
        
        // Counts elements in array
        $indexCount=count($dirArray);
        
        // Sorts files
        sort($dirArray);
        
        // Loops through the array of files
        for($index=0; $index < $indexCount; $index++) {
        
          // Allows ./?hidden to show hidden files
          if($_SERVER['QUERY_STRING']=="hidden")
          {$hide="";
          $ahref="./";
          $atext="Hide";}
          else
          {$hide=".";
          $ahref="./?hidden";
          $atext="Show";}
          if(substr("$dirArray[$index]", 0, 1) != $hide) {
          
          // Gets File Names
          $name=$dirArray[$index];
          $namehref=$dirArray[$index];
          
          // Gets Extensions 
          $extn=findexts($dirArray[$index]); 
          
          // Gets file size 
          $size=number_format(filesize($dirArray[$index]));
          
          // Gets Date Modified Data
          $modtime=date("M j Y g:i A", filemtime($dirArray[$index]));
          $timekey=date("YmdHis", filemtime($dirArray[$index]));
          
          // Prettifies File Types, add more to suit your needs.
          switch ($extn){
            case "png": $extn="PNG Image"; break;
            case "jpg": $extn="JPEG Image"; break;;
            case "gif": $extn="GIF Image"; break;

            case "txt": $extn="Text File"; break;
            case "pdf": $extn="PDF Document"; break;
            case "zip": $extn="ZIP Archive"; break;
            
            default: $extn=strtoupper($extn)." File"; break;
          }
          
          // Separates directories
          if(is_dir($dirArray[$index])) {
            $extn="&lt;Directory&gt;"; 
            $size="&lt;Directory&gt;"; 
            $class="dir";
          } else {
            $class="file";
          }
          
          // Cleans up . and .. directories 
          if($name=="."){$name=". (Current Directory)"; $extn="&lt;System Dir&gt;";}
          if($name==".."){$name=".. (Parent Directory)"; $extn="&lt;System Dir&gt;";}
          
          // Print 'em
          print("
          <tr class='$class'>
            <td><a href='./$namehref'>$name</a></td>
            <td><a href='./$namehref'>$extn</a></td>
            <td><a href='./$namehref'>$size</a></td>
            <td sorttable_customkey='$timekey'><a href='./$namehref'>$modtime</a></td>
          </tr>");
          }
        }
      ?>
												  
												</table>
												

												<section>
													<header>
													<h2><?php print("<a href='//10.10.20.144/sinacig/'>Regresar al menú</a>"); ?></h2>
													</header>
												</section>

											</div>
										</div>
						
							</div>
					
						</div>
						
			
					</div>
			</div>

			<!-- Footer -->
			<div class="copyright-area black-bg">
				<div class="container">
					<div class="row ">
						<div class="col-12 text-center">
							<div class="copyright-area ">					
							<img src="//10.10.20.144/sinacig/.images/footer.png" width="100%" height="auto" alt="Logo SGC">
								<p align="center">Copyright © 2022 Designed by <a href=""> Conred </a>. All rights reserved.</p>
							</div>
						</div>
					</div>
				</div>
			</div>

		<!-- Scripts -->
			<script src="//10.10.20.144/sinacig/.assets/js/jquery.min.js"></script>
			<script src="//10.10.20.144/sinacig/.assets/js/browser.min.js"></script>
			<script src="//10.10.20.144/sinacig/.assets/js/breakpoints.min.js"></script>
			<script src="//10.10.20.144/sinacig/.assets/js/util.js"></script>
			<script src="//10.10.20.144/sinacig/.assets/js/main.js"></script>

	</body>
</html>