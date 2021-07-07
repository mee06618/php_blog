package controller.test;

import java.io.IOException;

import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import com.wordbook.util.Crawler;

import service.test.WordDAO;
import service.test.WordVO;

public class TestWordlistAction implements service.Action {

	@Override
	public void execute(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		request.setCharacterEncoding("UTF-8");
		response.setContentType("text/html; charset=UTF-8");
		int num =Integer.parseInt(request.getParameter("num"));
		int lv =Integer.parseInt(request.getParameter("lv"));
	}

}
