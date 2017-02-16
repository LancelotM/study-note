package com.tarena.demo03;

import android.os.Bundle;
import android.app.Activity;
import android.util.Log;
import android.view.Menu;
import android.webkit.WebChromeClient;
import android.webkit.WebView;

public class MainActivity extends Activity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        
//        webViewʵ��������
        WebView wv = new WebView(getApplicationContext());
        
//        ���������url
        //wv.loadUrl("file:///android_asset/demo01.html");
        wv.loadUrl("http://172.163.100.78/chaptor4/angularJS/kaifanla/kaifanla.html");

//        ����wv����ִ��js
        wv.getSettings().setJavaScriptEnabled(true);
        
//        �鿴��ǰ�˿���̨�������־�����·�ʽ��
        wv.setWebChromeClient(
        		new WebChromeClient(){
        	@Override
        	@Deprecated
        	public void onConsoleMessage(String message,
        			int lineNumber, String sourceID) {
        		// TODO Auto-generated method stub
        		Log.e("test",
        				"�к�Ϊ:"+lineNumber+
        				" ��������Ϊ:"+message);
        		super.onConsoleMessage(message, lineNumber, sourceID);
        	}
        });
        
//        ����wvΪ��ǰactivity��ʾ����ͼ
        setContentView(wv);
    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }
    
}
