<?php
/**
* WordPress Query Comprehensive Reference wp_query参数中文翻译
* Compiled by luetkemj - luetkemj.github.io
* Translated by Wayne @ milad@vip.qq.com
* 开发交流QQ群：706173813
*
* Referrence: https://developer.wordpress.org/reference/classes/wp_query/#parameters
* Source: https://core.trac.wordpress.org/browser/tags/4.9.4/src/wp-includes/query.php
*/
/* 菜鸟提示：int是整数，string 是文本，array是数组，bool是是或者否，*/

$args = array(

// Author Parameters - 和帖子相关的作者.
// http://codex.wordpress.org/Class_Reference/WP_Query#Author_Parameters
  'author' => '1,2,3,', // (int | string) -  使用作者id或者用逗号分隔的id列表 [用减号-来排除作者，例如 ex. 'author' => '-1,-2,-3,']
  'author_name' => 'luetkemj', // (string) - 使用作者别称（作者后台页面可以设置，不是作者名字） (NOT name)
  'author__in' => array( 2, 6 ), // (array) - 使用作者id来表示查询哪些作者的帖子 (available with Version 3.7).
  'author__not_in' => array( 2, 6 ), // (array)' - 使用作者id来表示来排除哪些作者的帖子 (available with Version 3.7).

// Category Parameters - 分类相关参数.
// http://codex.wordpress.org/Class_Reference/WP_Query#Category_Parameters
  'cat' => 5, // (int) - 查询特定分类id下的帖子 (and any children of that category).
  'cat' => '-12,-34,-56' // 使用减号➖来排除这些指定分类下的帖子.
  'category_name' => 'staff, news', // (string) - 使用分类的slug来查询这些分类下的帖子 (和他们的子分类下的帖子)
  'category_name' => 'staff+news', // (string) - 使用加号➕来查询拥有这些所有分类的帖子
  'category__and' => array( 2, 6 ), // (array) - 使用id来查询同时在相关分类id下的帖子. 这里表示这些帖子同时在分类id2和分类id6.Both.
  'category__in' => array( 2, 6 ), // (array) - 使用id来表示帖子在这些分类id下面(包括同时和不同时)。 (不包含这些分类的子分类) Either.
  'category__not_in' => array( 2, 6 ), // (array) - 使用id来表示查询不包含有这些分类id的帖子 (不是分类的子分类)

// Tag Parameters - 查询相关指定标签下的帖子.
// http://codex.wordpress.org/Class_Reference/WP_Query#Tag_Parameters
  'tag' => 'cooking', // (string) - 使用tag的slug名称来查询帖子.
  'tag' => 'bread+baking+recipe', // (string) 查询有用这些所有标签的帖子
  'tag_id' => 5, // (int) - 查询该id标签下的帖子.
  'tag__and' => array( 2, 6), // (array) - 查询这些id下的帖子，双下划线 Both.
  'tag__in' => array( 2, 6), // (array) - 查询同时在这些标签下的帖子，双下划线 Either.
  'tag__not_in' => array( 2, 6), // (array) - 第一个双下划线，第二个下划线，查询没有这两个标签的帖子.
  'tag_slug__and' => array( 'red', 'blue'), // (array) - 同tag__and.
  'tag_slug__in' => array( 'red', 'blue'), // (array) - 同tag__in.

// Taxonomy Parameters - 用tax_query查询。查询大分类下面的帖子. taxonomy 包括 category\post-tag\post-frmat\自定义分类
	//Taxonomy的几种类型：category\post_tag\post_format是自带的，还有就是custom taxonomy.
// http://codex.wordpress.org/Class_Reference/WP_Query#Taxonomy_Parameters
// Important Note: tax_query takes an array of tax query arguments arrays (it takes an array of arrays)。 tax_query跟meta_query一样数组里面包含数组，可以通过关系 or 或者and 来查询多个tax query
// This construct allows you to query multiple taxonomies by using the relation parameter in the first (outer) array to describe the boolean relationship between the taxonomy queries.
  'tax_query' => array( // (array) - use taxonomy parameters (available with Version 3.1).
    'relation' => 'AND', // (string) - 只有单个array数组的时候不可用。 默认值是AND。 多个tax_query数组的时候表明数组和数组之间的关系成立条件。
    array(
      'taxonomy' => 'color', // (string) - 自定义分类，也可以是category等.
      'field' => 'slug', // (string) - 查询该分类类型下的分类字段。默认的是term_id。 可以是 'term_id', 'name', 'slug' 或者 'term_taxonomy_id'.
      'terms' => array( 'red', 'blue' ), // (int/string/array) 如果上面设置的查询分类字段是term_id， 这里就是array(2,4). 如果上面设置的slug， 这里就是red,blue. 
      'include_children' => true, // (bool) - 默认是true， 如果是分级的分类，设置是否包含子分类。
      'operator' => 'IN' // (string) - 操作方式. 值是 'IN', 'NOT IN', 'AND', 'EXISTS' and 'NOT EXISTS'. 默认值是 'IN'， 也就是在上面term条件里。
    ),
    array(
      'taxonomy' => 'actor',
      'field' => 'id',
      'terms' => array( 103, 115, 206 ),
      'include_children' => false,
      'operator' => 'NOT IN'
    )
  ),

// Post & Page Parameters - 根据post和page的参数来查询帖子.
// http://codex.wordpress.org/Class_Reference/WP_Query#Post_.26_Page_Parameters
  'p' => 1, // (int) - 查询post id 为1的帖子.
  'name' => 'hello-world', // (string) - 使用post slug.
  'title' => 'Hello World' // (string) - 使用post title
  'page_id' => 1, // (int) - 使用page id.
  'pagename' => 'sample-page', // (string) - 使用 page slug.
  'pagename' => 'contact_us/canada', // (string) - 查询该父级页面下的子页面
  'post_name__in' => 'sample-post' (array) // - 使用post slug来检索
  'post_parent' => 1, // (int) - 使用page id,返回子级页面。 只有设置为有层级的文章类型才能用。
  'post_parent__in' => array(1,2,3) // (array) - use post ids. 查询父级在数组里面的帖子。
  'post_parent__not_in' => array(1,2,3), // (array) - use post ids. 查询父级不在里面的帖子。
  'post__in' => array(1,2,3), // (array) - use post ids. 查询特定数组下的帖子. 注意：如果你使用置顶帖子, 他们将会被包含，如果要去掉置顶帖子，使用 ignore_sticky_posts
  'post__not_in' => array(1,2,3), // (array) - use post ids. 指定不查询的帖子.
  // NOTE: 不能同时使用post__in 和 post__not_in 

// Password Parameters - 根据post和page的内容来检索帖子。默认的文章类都是post.
// http://codex.wordpress.org/Class_Reference/WP_Query#Password_Parameters
  'has_password' => true, // (bool) - 检索带密码的帖子，null就是包含所有加密码和不加密码的帖子
                          // true for posts with passwords;
                          // false for posts without passwords;
                          // null for all posts with and without passwords
  'post_password' => 'multi-pass', // (string) - 检索特定密码的帖子

// Post Type Parameters - 检索post和page特定状态下的数据.
// http://codex.wordpress.org/Class_Reference/WP_Query#Type_Parameters
  'post_type' => array( // (string / array) - 检索文章类型，默认是post;
    'post', // - a post.
    'page', // - a page.
    'revision', // - a revision.
    'attachment', // - an attachment. The default WP_Query sets 'post_status'=>'published', but atchments default to 'post_status'=>'inherit' so you'll need to set the status to 'inherit' or 'any'.
    'nav_menu_item' // - a navigation menu item
    'my-custom-post-type', // - 自定义文章类型 (e.g. movies)
  ),
  // NOTE: The 'any' keyword available to both post_type and post_status queries cannot be used within an array.
  'post_type' => 'any', // - 检索不包括revisions和exclude_from_search参数设置为true的任何帖子。

// Post Status Parameters - 查询post 状态下的帖子。
// http://codex.wordpress.org/Class_Reference/WP_Query#Status_Parameters
    'post_status' => array( // (string | array) - post状态，下面几种都是状态。默认值是'publish'.
      'publish', // - a published post or page.
      'pending', // - post is pending review.
      'draft',  // - a post in draft status.
      'auto-draft', // - a newly created post, with no content.
      'future', // - a post to publish in the future.
      'private', // - not visible to users who are not logged in.
      'inherit', // - a revision. see get_children.
      'trash', // - post is in trashbin (available with Version 2.9).
    ),
    // NOTE: The 'any' keyword available to both post_type and post_status queries cannot be used within an array. any关键词不能用在数组里
    'post_status' => 'any', // - 检索 不带'exclude_from_search'设置为 true的任何状态的帖子.


// Comment Paremters - @since Version 4.9  `$comment_count`参数介绍.
// https://codex.wordpress.org/Class_Reference/WP_Query#Comment_Parameters
    'comment_count' => 10 // (int | array) 评论数量等于10的文章 ( 操作符是 '='  )
    'comment_count' => array( //评论数量等于或小于或大于10
      'value' => 10 // (int) - The amount of comments your CPT has to have when comparing
      'compare' => '=' // (string) - The search operator. Possible values are '=', '!=', '>', '>=', '<', '<='. Default value is '='.
    )

// Pagination Parameters 重要：分页参数
    //http://codex.wordpress.org/Class_Reference/WP_Query#Pagination_Parameters
    'posts_per_page' => 10, // (int) - 每页包含数量. 设置 'posts_per_page' => -1 显示所有的帖子.
                            // Note: if the query is in a feed, wordpress overwrites this parameter with the stored 'posts_per_rss' option. Treimpose the limit, try using the 'post_limits' filter, or filter 'pre_option_posts_per_rss' and return -1
    'nopaging' => false, // (bool) - 默认是'false', 显示分页.
    'paged' => get_query_var('paged'), // (int) - 通过get_query_var获取分页数量，就是获取浏览器地址后缀. 显示特定页的帖子当使用 "Older Entries" 链接时候.
                                       // NOTE: Use get_query_var('page'); 如果你希望你的分页在设置首页的页面能够显示. 检索的变量 'page' 包含单个已分页的post或page的 pagenumbe r包含 <!--nextpage--> Quicktag标签在post内容里.
    
    'posts_per_archive_page' => 10, // (int) - acchive模板上显示的每页帖子数量. 覆盖 posts_per_page and showposts on pages 当 is_archive() 或者 is_search() 设置为 true.
    'offset' => 3, // (int) - 设置多少数量帖子来展示或传递.
                   // Warning: Setting the offset parameter overrides/ignores the paged parameter and breaks pagination. for a workaround see: http://codex.wordpress.org/Making_Custom_Queries_using_Offset_and_Pagination
                   // The 'offset' parameter is ignored when 'posts_per_page'=>-1 (show all posts) is used.
    'paged' => get_query_var('paged'), // (int) - number of page. Show the posts that would normally show up just on page X when usinthe "Older Entries" link.
                                       // NOTE: This whole paging thing gets tricky. Some links to help you out:
                                       // http://codex.wordpress.org/Function_Reference/next_posts_link#Usage_when_querying_the_loop_with_WP_Query
                                       // http://codex.wordpress.org/Pagination#Troubleshooting_Broken_Pagination
    'page' => get_query_var('page'), // (int) - number of page for a static front page. Show the posts that would normally show up just on page X of a Static Front Page.
                                     // NOTE: The query variable 'page' holds the pagenumber for a single paginated Post or Page that includes the <!--nextpage--> Quicktag in the post content.
    'ignore_sticky_posts' => false, // (boolean) - 忽视置顶帖子，默认值是0，设置为1或者true的时候置顶的帖子就不会出现在循环里。、ignore/excclude posts 在帖子返回的头部就已经加载，就算你设置了的情况下，sticky posts 依然会在帖子加载顺序的时候加载。
	

// Order & Orderby Parameters - 对检索到的帖子进行排序.
// http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters
    'order' => 'DESC', // (string) - 设置排序方式是顺序'ASC'或者反序'DESC'，不设置的话默认是'DESC'
                       //Possible Values:
                       //'ASC' - 顺序，从低到高，如 (1, 2, 3; a, b, c).
                       //'DESC' - 反序，从高到低 (3, 2, 1; c, b, a).
    'orderby' => 'date', // (string) - 对检索的帖子进行排序的方式，默认是 'date'. 可以设置多个排序方式，如可以设置排序方式同时为menu_order和title. EX: 'orderby' => 'menu_order title'
                         //Possible Values:orderby的几个值
                         // 'none' - 没有排序No order (available since Version 2.8).
                         // 'ID' - 根据 post id排序. 注意排序方式是大写的ID 不是小写.
                         // 'author' - 排序方式是根据作者排序，author，也可以用post_author
                         // 'title' - 根据标题排序，也可以用post_title
                         // 'name' - 根据帖子名字，也就是post slug排序，也可以用post_name
                         // 'type' - 根据文章类型排序，也可以用post_type (available since Version 4.0). ('post_type' is also accepted.)
                         // 'date' - 根据时间排序，也可以用post_date. ('post_date' is also accepted.)
                         // 'modified' - 根据上次修改时间排序，也可以用post_modified. ('post_modified' is also accepted.)
                         // 'parent' - 根据帖子或者页面父级id进行排序，也可以用post_parent.
                         // 'rand' - 随机排序. 也可以用 'RAND(x)' 当 'x' 是整数seed值.
                         // 'comment_count' - 根据评论数量进行排序 (available since Version 2.9).
                         // 'relevance' - Order by search terms in the following order: First, whether the entire sentence is matched. Second, if all the search terms are within the titles. Third, if any of the search terms appear in the titles. And, fourth, if the full sentence appears in the contents.
                         // 'menu_order' - 根据页面菜单排序。页面的时候最常用。其他文章类型也都用，都设置默认为0 (Order field in the Edit Page Attributes box) and for Attachments (the integer fields in the Insert / Upload Media Gallery dialog), but could be used for any post type with distinct 'menu_order' values (they all default to 0).
                         // 'meta_value' - 根据字段的值进行排序，当用到这个的时候，一定有个前置的参数选项：meta_key = 字段名称 Note that a 'meta_key=keyname' must also be present in the query. Note also that the sorting will be alphabetical which is fine for strings (i.e. words), but can be unexpected for numbers (e.g. 1, 3, 34, 4, 56, 6, etc, rather than 1, 3, 4, 6, 34, 56 as you might naturally expect). Use 'meta_value_num' instead for numeric values.
                         // 'meta_type' - 排序字段的特定类别，可能的值为 'NUMERIC', 'BINARY',  'CHAR', 'DATE', 'DATETIME', 'DECIMAL', 'SIGNED', 'TIME', 'UNSIGNED', 跟'$meta_query'变量一样. 当使用'meta_type'你可以直接使用'meta_value_*'. 比如，当使用DATETIME作为'meta_type'你可以使用'meta_value_datetime'来定义排序结构.
                         // 'meta_value_num' - 根据数字字段值进行排序。 注意'meta_key=keyname'必须要前置，跟meta_value一样. 这个值就是上面'meta_value'的数字值.
                         // 'post__in' - Preserve post ID order given in the 'post__in' array (available since Version 3.5). Note - the value of the order parameter does not change the resulting sort order.
                         // 'post_name__in' - Preserve post slug order given in the 'post_name__in' array (available since Version 4.6). Note - the value of the order parameter does not change the resulting sort order.
                         // 'post_parent__in' - Preserve post parent order given in the 'post_parent__in' array (available since Version 4.6). Note - the value of the order parameter does not change the resulting sort order.

// Date Parameters - Show posts associated with a certain time and date period.
// http://codex.wordpress.org/Class_Reference/WP_Query#Date_Parameters
    'year' => 2014, // (int) - 4 digit year (e.g. 2011).
    'monthnum' => 4, // (int) - Month number (from 1 to 12).
    'w' =>  25, // (int) - Week of the year (from 0 to 53). Uses the MySQL WEEK command. The mode is dependenon the "start_of_week" option.
    'day' => 17, // (int) - Day of the month (from 1 to 31).
    'hour' => 13, // (int) - Hour (from 0 to 23).
    'minute' => 19, // (int) - Minute (from 0 to 60).
    'second' => 30, // (int) - Second (0 to 60).
    'm' => 201404, // (int) - YearMonth (For e.g.: 201307).
    'date_query' => array( // (array) - Date parameters (available with Version 3.7).
                           // these are super powerful. check out the codex for more comprehensive code examples http://codex.wordpress.org/Class_Reference/WP_Query#Date_Parameters
      array(
        'year' => 2014, // (int) - 4 digit year (e.g. 2011).
        'month' => 4, // (int) - Month number (from 1 to 12).
        'week' => 31, // (int) - Week of the year (from 0 to 53).
        'day' => 5, // (int) - Day of the month (from 1 to 31).
        'hour' => 2, // (int) - Hour (from 0 to 23).
        'minute' => 3, // (int) - Minute (from 0 to 59).
        'second' => 36, // (int) - Second (0 to 59).
        'after' => 'January 1st, 2013', // (string/array) - Date to retrieve posts after. Accepts strtotime()-compatible string, or array of 'year', 'month', 'day'
        'before' => array( // (string/array) - Date to retrieve posts after. Accepts strtotime()-compatible string, or array of 'year', 'month', 'day'
          'year' => 2013, // (string) Accepts any four-digit year. Default is empty.
          'month' => 2, // (string) The month of the year. Accepts numbers 1-12. Default: 12.
          'day' => 28, // (string) The day of the month. Accepts numbers 1-31. Default: last day of month.
        ),
        'inclusive' => true, // (boolean) - For after/before, whether exact value should be matched or not'.
        'compare' =>  '=', // (string) - Possible values are '=', '!=', '>', '>=', '<', '<=', 'LIKE', 'NOT LIKE', 'IN', 'NOT IN', 'BETWEEN', 'NOT BETWEEN', 'EXISTS' (only in WP >= 3.5), and 'NOT EXISTS' (also only in WP >= 3.5). Default value is '='
        'column' => 'post_date', // (string) - Column to query against. Default: 'post_date'.
        'relation' => 'AND', // (string) - OR or AND, how the sub-arrays should be compared. Default: AND.
      ),
    ),

// Custom Field Parameters - Show posts associated with a certain custom field.
// http://codex.wordpress.org/Class_Reference/WP_Query#Custom_Field_Parameters
    'meta_key' => 'key', // (string) - Custom field key.
    'meta_value' => 'value', // (string) - Custom field value.
    'meta_value_num' => 10, // (number) - Custom field value.
    'meta_compare' => '=', // (string) - Operator to test the 'meta_value'. Possible values are '=', '!=', '>', '>=', '<', '<=', 'LIKE', 'NOT LIKE', 'IN', 'NOT IN', 'BETWEEN', 'NOT BETWEEN', 'NOT EXISTS', 'REGEXP', 'NOT REGEXP' or 'RLIKE'. Default value is '='.
    'meta_query' => array( // (array) - Custom field parameters (available with Version 3.1).
      'relation' => 'AND', // (string) - Possible values are 'AND', 'OR'. The logical relationship between each inner meta_query array when there is more than one. Do not use with a single inner meta_query array.
       array(
         'key' => 'color', // (string) - Custom field key.
         'value' => 'blue', // (string/array) - Custom field value (Note: Array support is limited to a compare value of 'IN', 'NOT IN', 'BETWEEN', or 'NOT BETWEEN') Using WP < 3.9? Check out this page for details: http://codex.wordpress.org/Class_Reference/WP_Query#Custom_Field_Parameters
         'type' => 'CHAR', // (string) - Custom field type. Possible values are 'NUMERIC', 'BINARY', 'CHAR', 'DATE', 'DATETIME', 'DECIMAL', 'SIGNED', 'TIME', 'UNSIGNED'. Default value is 'CHAR'. The 'type' DATE works with the 'compare' value BETWEEN only if the date is stored at the format YYYYMMDD and tested with this format.
                           //NOTE: The 'type' DATE works with the 'compare' value BETWEEN only if the date is stored at the format YYYYMMDD and tested with this format.
         'compare' => '=', // (string) - Operator to test. Possible values are '=', '!=', '>', '>=', '<', '<=', 'LIKE', 'NOT LIKE', 'IN', 'NOT IN', 'BETWEEN', 'NOT BETWEEN', 'EXISTS' (only in WP >= 3.5), and 'NOT EXISTS' (also only in WP >= 3.5). Default value is '='.
       ),
       array(
         'key' => 'price',
         'value' => array( 1,200 ),
         'compare' => 'NOT LIKE',
       )
    ),
	/* compare的LIKE解释：meta_query设置条件value值的时候会出现没有值或者没定义的情况，当设置compare为LIKE的时候，就相当于设置了value值为全局符*，可以是任何值，会显示其自身任何类型的值，
	例如：当我们设置color 的value值为'bl'时候， 设置为compare为LIKE的时候，也就是查询的是bl*。也就是会获取到所有数据为blue的值。当value是空值的时候，获取到的只有*，也就是获取到任何存在的值。 */
  /* meta query 可以多个数组嵌套来实现多条件的查询，比方说下面就实现了price在50-200之间或size < xl 这个条件和 color = white这个条件的并列 */

				'meta_query'  => array(
					'relation'  => 'AND',
					array(
						'relation'  => 'OR',
						array(
							'key' => 'price',
						'value' => array(50,200),
						'compare' => 'BETWEEN',
						'type'  => 'NUMERIC'  //设置类型的时候才能用between， 因为type的默认值是char
					),
						array(
							'key'  => 'size',
							'value' => 'xl',
							'type' => 'CHAR',
							'compare' => '<'

						),),

					array(
						'key'  => 'color',
						'value'  => 'white',
						'compare' => '='
					),

// Permission Parameters - Display published posts, as well as private posts, if the user has the appropriate capability:
// http://codex.wordpress.org/Class_Reference/WP_Query#Permission_Parameters
    'perm' => 'readable', // (string) Possible values are 'readable', 'editable'

// Mime Type Parameters - Used with the attachments post type.
// https://codex.wordpress.org/Class_Reference/WP_Query#Mime_Type_Parameters
    'post_mime_type' => 'image/gif', // (string/array) - Allowed mime types.


// Caching Parameters
// http://codex.wordpress.org/Class_Reference/WP_Query#Caching_Parameters
// NOTE Caching is a good thing. Setting these to false is generally not advised.
    'cache_results' => true, // (bool) Default is true - Post information cache.
    'update_post_term_cache' => true, // (bool) Default is true - Post meta information cache.
    'update_post_meta_cache' => true, // (bool) Default is true - Post term information cache.
    'no_found_rows' => false, // (bool) Default is false. WordPress uses SQL_CALC_FOUND_ROWS in most queries in order to implement pagination. Even when you don’t need pagination at all. By Setting this parameter to true you are telling wordPress not to count the total rows and reducing load on the DB. Pagination will NOT WORK when this parameter is set to true. For more information see: http://flavio.tordini.org/speed-up-wordpress-get_posts-and-query_posts-functions


// Search Parameter
// http://codex.wordpress.org/Class_Reference/WP_Query#Search_Parameter
    's' => $s, // (string) - Passes along the query string variable from a search. For example usage see: http://www.wprecipes.com/how-to-display-the-number-of-results-in-wordpress-search
    'exact' => true, // (bool) - flag to make it only match whole titles/posts - Default value is false. For more information see: https://gist.github.com/2023628#gistcomment-285118
    'sentence' => true, // (bool) - flag to make it do a phrase search - Default value is false. For more information see: https://gist.github.com/2023628#gistcomment-285118

// Post Field Parameters
// For more info see: http://codex.wordpress.org/Class_Reference/WP_Query#Return_Fields_Parameter
// also https://gist.github.com/luetkemj/2023628/#comment-1003542
    'fields' => 'ids', // (string) - Which fields to return. All fields are returned by default.
                       // Possible values:
                       // 'ids'        - Return an array of post IDs.
                       // 'id=>parent' - Return an associative array [ parent => ID, … ].
                       // Passing anything else will return all fields (default) - an array of post objects.

// Filters
// For more information on available Filters see: http://codex.wordpress.org/Class_Reference/WP_Query#Filters

);

$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) :
while ( $the_query->have_posts() ) : $the_query->the_post();
  // Do Stuff
endwhile;
endif;

// Reset Post Data
wp_reset_postdata();
