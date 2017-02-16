package com.tarena.demo02;

import android.os.Bundle;
import android.app.Activity;
import android.view.Menu;
import android.webkit.WebView;


public class MainActivity extends Activity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        //实例化webView对象 快捷方式:alt+/
        WebView wv = new WebView(getApplicationContext());
        
        //配置wv，载入指定的页面
        wv.loadUrl("file:///android_asset/index.html");
        
        //让wv作为当前activity的显示的内容
        setContentView(wv);
    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }
    
}
