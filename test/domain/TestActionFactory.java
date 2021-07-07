package domain.test;

import controller.test.TestNextbtnAction;

import service.Action;

public class TestActionFactory {
	private static TestActionFactory instacne = new TestActionFactory();

	private TestActionFactory() {}

	public static TestActionFactory getInstance() {
		return instacne;
	}

	public Action getAction(String cmd) {
		Action action = null;
	

		
		if (cmd.equals("test_nextbtn")) {
			action = new TestNextbtnAction();
		} 
	
		

		return action;
	}
}
