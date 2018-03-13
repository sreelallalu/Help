      /*Need Activity for display AlertDialog, because we can't display Dialog from any Service

        Solution.

        Create Activity as Dialog Theme and start that Activity from Service.

        Just need to register you Activity in menifest.xml like as below

        android:theme="@android:style/Theme.Dialog"
        or

        android:theme="@android:style/Theme.Translucent.NoTitleBar"

        MyDialog.java
*/
public class MyDialog extends Activity {
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        final AlertDialog alertDialog = new AlertDialog.Builder(this).create();
        alertDialog.setTitle("your title");
        alertDialog.setMessage("your message");
        alertDialog.setIcon(R.drawable.icon);

        alertDialog.show();
    }
}