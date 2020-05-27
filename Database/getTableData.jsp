<%@ page import="java.sql.*"%>
<%@ page import="java.io.*"%>
<html>
<body>
	<%
		response.setHeader("Access-Control-Allow-Origin", "*");
		try
		{
			String connectionURL = "jdbc:mysql://localhost";
			Connection con = null;
			String dbName = request.getParameter("db");
			String tableName = request.getParameter("table");

			Class.forName("com.mysql.jdbc.Driver").newInstance();
			con = DriverManager.getConnection(connectionURL, "Satish", "Satish");
			String sql =  "SELECT * FROM " + dbName +  "." + tableName;
			PreparedStatement stmt = con.prepareStatement(sql);
			ResultSet rs = stmt.executeQuery();
			ResultSetMetaData resultSetMetaData = rs.getMetaData();
			int countOfColumns = resultSetMetaData.getColumnCount();
			out.println("<table border = '1'>");
			out.println("<tr>");
			for(int counter = 1; counter <= countOfColumns; counter++)
			{
				out.println("<td>" + resultSetMetaData.getColumnName(counter) + "</td>");
			}
			out.println("</tr>");
			while(rs.next())
			{
				out.println("<tr>");
				for(int counter = 1; counter <= countOfColumns; counter++)
				{
					out.println("<td>" + rs.getString(counter) + "</td>");
				}
				out.println("</tr>");	
			}
			con.close();
			out.println("</table>");
		}
		catch(Exception ex)
		{
			ex.printStackTrace();
		}

	%>
</body>

</html>