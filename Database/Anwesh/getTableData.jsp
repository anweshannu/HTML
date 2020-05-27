<%@ page import="java.sql.*"%>
<%@ page import="java.io.*"%>

<%
	response.setHeader("Access-Control-Allow-Origin", "*");
	try
	{
		String connectionURL = "jdbc:mysql://localhost";
		Connection con = null;
		String dbName = request.getParameter("db");
		String tableName = request.getParameter("table");

		Class.forName("com.mysql.jdbc.Driver").newInstance();
		con = DriverManager.getConnection(connectionURL, "Anwesh", "Anwesh");
		String sql =  "select * from " + dbName +  "." + tableName;
		PreparedStatement stmt = con.prepareStatement(sql);
		ResultSet rs = stmt.executeQuery();
		ResultSetMetaData resultSetMetaData = rs.getMetaData();
		int countOfColumns = resultSetMetaData.getColumnCount();


		out.println("<table class = 'table table-bordered'	>");
		out.println("<thead>");
		out.println("<tr>");
		for(int counter = 1; counter <= countOfColumns; counter++)
		{
			out.println("<td>" + resultSetMetaData.getColumnName(counter) + "</td>");
		}
		out.println("</tr>");
		out.println("</thead>");
		out.println("<tbody>");
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
		out.println("</tbody>");
		out.println("</table>");
	}
	catch(Exception ex)
	{
		ex.printStackTrace();
	}
%>
