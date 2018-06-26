import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class SQLiteDb extends SQLiteOpenHelper {

  final static    String name="dddd";


    public SQLiteDb(Context context) {
        super(context, name, null, 1);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        String  TABLE_STUCTURE="create  table  halloword ( " +
                "id  INTEGER PRIMARY KEY , name TEXT ," +
                "book TEXT ) ";

        db.execSQL(TABLE_STUCTURE);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int i, int i1) {
    db.execSQL("drop  table  if exists halloword");

    //db want to delete


     //   db.execSQL -> drop  table  if exists halloword


        onCreate(db);

    }

    public void dbquery(String ab)
    {
        SQLiteDatabase db=this.getWritableDatabase();
        SQLiteDatabase dbn=this.getReadableDatabase();
        ContentValues values=new ContentValues();
        values.put("book","elite_book");
        db.insert(name,null,values);
        db.close();


        // query reading...

        String quesry="select * from tablename";
        Cursor cursor = db.rawQuery(quesry, null);
        if(cursor.moveToFirst()) {
            do {
               String bookname= cursor.getString(cursor.getColumnIndex("name"));
                return ;

            } while (cursor.moveToNext());
        }


        //batch query ----
        db.beginTransaction();
        try {
            ContentValues contentValues = new ContentValues();
            for (District city : district) {
                values.put("book",district.getValue());

                db.insert(name, null, contentValues);
            }
            db.setTransactionSuccessful();
        } finally {
            db.endTransaction();
        }




    }




}
