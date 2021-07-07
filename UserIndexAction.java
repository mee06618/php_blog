package controller.user;

import java.io.IOException;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import com.wordbook.util.Crawler;

import service.test.WordDAO;
import service.test.WordVO;



public class UserIndexAction implements service.Action {

	@Override
	public void execute(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		
		int ran = (int)(Math.random()*Crawler.getSize(Integer.parseInt(request.getParameter("lv")))+1);
		WordVO vo = Crawler.getWords(Integer.parseInt(request.getParameter("lv")),ran); 
		System.out.println(vo.getExplain());
		String str[] =vo.getExplain().split(",|;");
		int size=Crawler.getSize(Integer.parseInt(request.getParameter("lv")));
		int lv=Integer.parseInt(request.getParameter("lv"));
		request.setCharacterEncoding("utf-8");
		request.setAttribute("word", vo.getWord());
		request.setAttribute("explain",str[0]);
		request.setAttribute("num", ran);
		request.setAttribute("size", size);
		request.setAttribute("lv", lv);
		RequestDispatcher dispatcher = request.getRequestDispatcher("/Include/main.jsp");
		dispatcher.forward(request, response);
	}

}
