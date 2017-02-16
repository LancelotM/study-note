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
        
//        webView实例化对象
        WebView wv = new WebView(getApplicationContext());
        
//        配置载入的url
        //wv.loadUrl("file:///android_asset/demo01.html");
        wv.loadUrl("http://172.163.100.78/chaptor4/angularJS/kaifanla/kaifanla.html");

//        设置wv允许执行js
        wv.getSettings().setJavaScriptEnabled(true);
        
//        查看在前端控制台输入的日志，如下方式：
        wv.setWebChromeClient(
        		new WebChromeClient(){
        	@Override
        	@Deprecated
        	public void onConsoleMessage(String message,
        			int lineNumber, String sourceID) {
        		// TODO Auto-generated method stub
        		Log.e("test",
        				"行号为:"+lineNumber+
        				" 输入内容为:"+message);
        		super.onConsoleMessage(message, lineNumber, sourceID);
        	}
        });
        
//        设置wv为当前activity显示的视图
        setContentView(wv);
    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }
    
}
