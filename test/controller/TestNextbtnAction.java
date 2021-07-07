package controller.test;

import java.io.IOException;

import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import com.wordbook.util.Crawler;

import service.test.WordDAO;
import service.test.WordVO;

public class TestNextbtnAction implements service.Action {

	@Override
	public void execute(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		request.setCharacterEncoding("UTF-8");
		response.setContentType("text/html; charset=UTF-8");
		PrintWriter writer = response.getWriter();
		int side = Integer.parseInt(request.getParameter("side"));
		int num = Integer.parseInt(request.getParameter("num"));
		int size = Integer.parseInt(request.getParameter("size"));
		int lv = Integer.parseInt(request.getParameter("lv"));
		WordDAO dao = WordDAO.getInstance();
		if (num < size && side > 0) {
			++num;

			WordVO vo = dao.getword(lv, num);

			String explain[] = vo.getExplain().split(",|;");
			String word = vo.getWord();

			try {
				System.out.println(word + " " + explain[0]);

				writer.write(word + "||" + explain[0] + "|||" + num);

				writer.close();
			} catch (Exception e) {
			}
		} else if (num < size && side < 0) {
			--num;

			WordVO vo = dao.getword(lv, num);

			String explain[] = vo.getExplain().split(",|;");
			String word = vo.getWord();

			try {
				System.out.println(word + " " + explain[0]);

				writer.write(word + "||" + explain[0] + "|||" + num);

				writer.close();
			} catch (Exception e) {
			}
		}
	}

}
