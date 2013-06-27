package com.example.lab1;

import android.os.Bundle;
import android.app.Activity;
//import android.view.Menu;
import android.widget.TextView;

public class MainActivity extends Activity {

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		
		
		Bundle myInput = this.getIntent().getExtras();
		
		TextView t = new TextView(this);
		t = (TextView)findViewById(R.id.textView2);
		t.setText("Hello "+ (myInput.getString("uname")));
		 
	}
/*
	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}
*/
}

	
	 