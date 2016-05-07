<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>         
        <meta charset="utf-8">    
        <meta name="viewport" content="width=device-width, initial-scale=1">    
   
        <!--Own CSS-->
        <link rel="stylesheet" type="text/css" href="<?=$this->url->getBaseUri()?>public/css/style.css" />
        
        
        <!--Title-->
        <title>Phalcon Skeleton With PhalconBoot</title>             

        
        <!-- JS Library -->
        <script type="text/javascript" src="<?=$this->url->getBaseUri()?>public/js/jquery.min.js" ></script>        
               
        <!--JS Main (load before page's script. To do:)-->
        <script type="text/javascript" src="<?=$this->url->get('public/js/') ?>/main.js"></script>       
        
        
        <!-- js config -->
        <script type="text/javascript"> 
            //Use in Script of each page
            var BASE_URI = <?=$this->url->getBaseUri();?>;
        </script>

    </head>
    <body>        
        <!--Sub Content-->
        <div id="sub-content">
            <?=$this->getContent();?>            
        </div>
    </body>

</html>
