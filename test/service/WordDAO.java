package service.test;

import java.sql.*;
import java.util.List;

import util.DBManager;

public class WordDAO {
	private WordDAO() {
	}

	private static WordDAO instance = new WordDAO();

	public static WordDAO getInstance() {
		return instance;
	}

	public WordVO getword(int lv, int num) {
		WordVO vo = new WordVO();
		Connection conn = null;
		PreparedStatement pstmt = null;
		ResultSet rs = null;
		String sql = "select word,explan from tbl_word where lv=? , num=? ";
		try {
			conn = DBManager.getConnection();
			pstmt = conn.prepareStatement(sql);
			pstmt.setInt(1, lv);
			pstmt.setInt(2, num);
			rs = pstmt.executeQuery();
			if (rs.next()) {
				vo.setWord(rs.getString(1));
				vo.setExplain(rs.getString(2));
			}
		} catch (Exception e) {
			try {
				DBManager.close(conn, pstmt, rs);
			} catch (Exception ee) {
			}

		}

		return vo;
	}

	public int setword(String word, String explain, int lv,int i) {
		Connection conn = null;
		PreparedStatement pstmt = null;
		ResultSet rs = null;
		int num=0;
			String sql = "insert into tbl_word(num,word,explain,lv) values(tbl_word_sequence.nextval,?,?,?)";
			try {
				conn = DBManager.getConnection();

				pstmt = conn.prepareStatement(sql);
				pstmt.setString(1, word);
				pstmt.setString(2, explain);
				pstmt.setInt(3, lv);
				
				num=pstmt.executeUpdate();
			} catch (Exception e) {
				try {
					DBManager.close(conn, pstmt, rs);
				} catch (Exception ee) {
				}

			}
		return num;
	}
}
