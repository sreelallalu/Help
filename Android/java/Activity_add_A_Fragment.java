

// Activity create a fragment in activity

public void CreateFragment()
        {

        FragmentTransaction ft = getSupportFragmentManager()
        .beginTransaction();

        //FileListFragment is a Fragment

        FileListFragment files_listing_fragment = FileListFragment.getInstance(ip, ssid, senderInfo[0], senderInfo[1]);
//        ft.setCustomAnimations(R.anim.push_left_in, R.anim.push_left_out,
//                R.anim.push_right_in, R.anim.push_right_out);
        ft.add(R.id.sender_files_list_fragment_holder, files_listing_fragment, TAG_SENDER_FILES_LISTING).commitAllowingStateLoss();

        }

public void RemoveFragment)()
        {

        Fragment fragment = getSupportFragmentManager().findFragmentByTag(TAG_SENDER_FILES_LISTING);
        if (null != fragment)
        getSupportFragmentManager()
        .beginTransaction()
        .remove(fragment).commitAllowingStateLoss();

        }

