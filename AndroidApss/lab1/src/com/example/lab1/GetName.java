package com.example.lab1;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.Button;



public class GetName extends Activity implements android.view.View.OnClickListener{
	
	EditText name;
	Button button;
	
	
	public void onCreate(Bundle savedInstanceState){
		super.onCreate(savedInstanceState);
		this.setContentView(R.layout.name_getter);
		name = (EditText) this.findViewById(R.id.editText1);
		button = (Button) this.findViewById(R.id.button1);
		
		button.setOnClickListener(this);
	}
	public void onClick(View arg0){
		Intent myIntent = new Intent(this, MainActivity.class);
		myIntent.putExtra("uname",name.getText() .toString());
		this.startActivity(myIntent);
		
	}
	
	
}
