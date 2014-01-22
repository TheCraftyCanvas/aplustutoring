<?php
  if($post_type != 'comment_authors') {
    query_posts(array('posts_per_page' => -1, 'order'=>'DESC', 'post_type' => $post_type));//-1 is for all posts
    $str .= '<table>
              <tr>
                <td colspan=7>' . get_bloginfo('name').'
              </tr>';
    if (have_posts()) {
      $str .= '<tr>
                <th>Name</th>
                <th>Description</th>
                <th>Url</th>
                <th>Created on</th>
                <th>Author</th>
                <th>Categories</th>
                <th>Tags</th>
              </tr>';
      while (have_posts()) {
        the_post();

        $all_cats = '';
        foreach( (get_the_category()) as $category) {
          $all_cats .= $category->cat_name . ', ';
        }
        $all_cats = substr($all_cats, 0, -2);


        $all_tags = '';
        $posttags = get_the_tags();
        if ($posttags) {
          foreach( (get_the_tags()) as $tag) {
            $all_tags .= $tag->name . ', ';
          }
          $all_tags = substr($all_tags, 0, -2);
        }
        global $post;

        $str.= '
          <tr>
            <td>' . mb_convert_encoding(get_the_title(), 'HTML-ENTITIES', 'UTF-8') . '</td>
            <td>' . mb_convert_encoding($post->post_content, 'HTML-ENTITIES', 'UTF-8') . '</td>
            <td>' . get_permalink() .'</td>
            <td>' . get_the_date('Y-m-d', '', '', FALSE) .'</td>
            <td>' . get_the_author() .'</td>
            <td>' . $all_cats . '</td>
            <td>' . $all_tags . '</td>
          </tr>';
      }
      wp_reset_query();
    } else {
      $str .= '<tr colspan="6"><td>No post found.</td></tr>';
    }
    $str.= '</table><br/></br>';
  } else {
    global $wpdb,$table_prefix;
    $str .= '<table>
            <tr>
              <td colspan=6>' . get_bloginfo('name').'
            </tr>';
    $str .= '<tr>
              <th>Commenter</th>
              <th>Email Address</th>
              <th>Url</th>
              <th>Created on</th>
              <th>IP Address</th>
              <th>Comments</th>
            </tr>';
   $commenters = $wpdb->get_results("SELECT COUNT(comment_ID) AS count, comment_ID, comment_author, comment_author_email, comment_author_url, comment_date, comment_author_IP FROM $table_prefix"."comments WHERE comment_approved = 1 AND comment_type = '' GROUP BY comment_author, comment_author_email ORDER BY comment_author ASC, comment_date DESC;");

    foreach ($commenters as $row)
    {
      $str.= '<tr>
               <td>'.$row->comment_author.'</td>';
      $str.= '<td>'.$row->comment_author_email."</td>";
      $str.= '<td>'.$row->comment_author_url."</td>";
      $str.= '<td>'.$row->comment_date."</td>";
      $str.= '<td>'.$row->comment_author_IP."</td>";
      $str.= '<td>'.$row->count."</td>
             </tr>";
    }
  }
