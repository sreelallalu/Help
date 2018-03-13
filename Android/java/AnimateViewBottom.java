public void Animate(View view)
        {
        Display display=getWindowManager().getDefaultDisplay();
        Point point=new Point();
        display.getSize(point);
  final int width=point.y; // screen height
   final float halfW=width/2.0f;
        //Y orX transactionY or tranX
        ObjectAnimator lftToRgt=ObjectAnimator.ofFloat(view,"Y",200,0f)
        .setDuration(3200); // to animate left to right

        AnimatorSet s=new AnimatorSet();//required to set the sequence

        s.setInterpolator(new BounceInterpolator());
        s.play(lftToRgt); // manage sequence

        s.start();
        }