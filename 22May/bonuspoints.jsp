<%@ page import = "java.io.*"%>
<%@page import = "java.util.*" %>

<html>
   <head>
      <title>Bonus points</title>
      <meta http-equiv = "refresh" content = "3">
   </head>
   <body>
      <%
         Integer bonus_points = (Integer)session.getAttribute("bonus_points");
         if( bonus_points == null || bonus_points == 0 ) 
         {
            bonus_points = 7;
         } 
         else 
         {
            bonus_points += 7;
         }
         session.setAttribute("bonus_points", bonus_points);
      %>
      <div align = "center">
         <h4>Bonus points: <%= bonus_points%></h4>
      </div>
   
   </body>
</html>
