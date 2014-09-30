<?php
	#Route to the index.php inside the view folder
	#That way the relative paths of the .html files will work 
	#Once we deploy in production, we can change the relative paths to absolute paths
	#In that case, we can just call the include's here.
	Header("Location: control/intro.php");
?>