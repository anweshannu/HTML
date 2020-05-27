<%@ page import = "java.io.*" %>
<%@ page import = "java.sql.*" %>
<html>
<head>
</head>
<body>
	<%
	response.setHeader("Access-Control-Allow-Origin", "*");
	try
	{
		String url = "jdbc:mysql://localhost";
		String userName = "Anudeep";
		String password = "Anudeep";
		String tableName = request.getParameter("table");
		String dbName = request.getParameter("db");
		Class.forName("com.mysql.jdbc.Driver").newInstance();
		Connection connection = DriverManager.getConnection(url, userName, password);
		String query = "SELECT * FROM " + dbName +  "." + tableName;
		Statement statement = connection.createStatement();
		ResultSet resultSet = statement.executeQuery(query);
		ResultSetMetaData resultSetMetaData = resultSet.getMetaData();
		int countOfColumns = resultSetMetaData.getColumnCount();

		for(int counter = 1; counter <= countOfColumns; counter++)
		{
			out.println(resultSetMetaData.getColumnName(counter));
		}
		out.println("<br>");
		while(resultSet.next())
		{
			for(int counter = 1; counter <= countOfColumns; counter++)
			{
				out.println(resultSet.getString(counter));
			}
			out.println("<br>");	
		}
		connection.close();
	}
	catch(Exception ex)
	{
		//ex.printStackTrace();
	}
	%>
</body>
</html>
