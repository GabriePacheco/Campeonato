<%@ Page Language="VB" AutoEventWireup="false" CodeFile="Default.aspx.vb" Inherits="HTML5_Default" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Como crear una tabla con divs</title>
    <style type="text/css">

        .Table

        {

            display: table;
			width:100%;

        }

      


        .Row

        {

            display: table-row;

        }

        .Cell

        {

            display: table-cell;

            border: solid;

            border-width: thin;

            padding-left: 5px;

            padding-right: 5px;

        }

    </style>
</head>
<body>
    <form id="form1" runat="server">
    <section> 
    	<div class="Table">
        	<div class="Row"> 
            	<div class="Cell">
                	<div>fecha</div>
                    <div>Marcador</div>
                    <div>estado</div>   
                </div>
                <div class="Cell">
                	<div>fecha</div>
                    <div>Marcador</div>
                    <div>estado</div>   
                </div>
                <div class="Cell">
                	<div>fecha</div>
                    <div>Marcador</div>
                    <div>estado</div>   
                </div>
                <div class="Cell">
                	<div>fecha</div>
                    <div>Marcador</div>
                    <div>estado</div>   
                </div><div class="Cell">
                	<div>fecha</div>
                    <div>Marcador</div>
                    <div>estado</div>   
                </div><div class="Cell">
                	<div>fecha</div>
                    <div>Marcador</div>
                    <div>estado</div>   
                </div>
            </div>
            
        </div>
    </section>
    </form>
</body>
</html>
