//This is the first page of the two-servlet application. It has a form where the user can enter the name, a greeting based on the name stored in the session, and a link to the second page.



import java.io.*;
import java.text.*;
import java.util.*;
import javax.servlet.*;
import javax.servlet.http.*;



public class MySession1 extends HttpServlet {

    HttpSession session;

        public void doGet(HttpServletRequest request,
                      HttpServletResponse response)
        throws IOException, ServletException
    {
        response.setContentType("text/html");

	// session is retrieved before getting the writer

	session = request.getSession(true);
	
	if (session.getAttribute("userName") == null) {
	    session.setAttribute("userName", "Stranger");
	}
	
	      
        PrintWriter out = response.getWriter();

        out.println("<html>");
        out.println("<body bgcolor=\"lightblue\">");
        out.println("<head>");

	out.println("<title> A session example </title>");
        out.println("</head>");
        out.println("<body>");

	out.println("<h1> A session example page 1</h1>");

        out.println("<P>");
        out.print("<form action=\"");
        out.print(response.encodeURL("MySession1"));
        out.print("\" ");
        out.println("method=POST>");
        out.println("What's your name?");
        out.println("<br>");
        out.println("<input type=text size=20 name=myname>");
        out.println("<br>");
        out.println("<input type=submit>");
        out.println("</form>");
	
	out.println("Welcome " + (String) session.getAttribute("userName") + "!");

	out.println("<P><A HREF = \"MySession2\">go to page 2</A>");

	out.println("</body>");
	out.println("</html>");

	out.close();

    }

    public void doPost(HttpServletRequest request,
                      HttpServletResponse response)
        throws IOException, ServletException
    {
	session = request.getSession(true);
	session.setAttribute("userName", request.getParameter("myname"));
        doGet(request, response);
    }

}
