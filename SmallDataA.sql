/*
 * 	Member
 */
 
INSERT INTO member (username, password, salt, email, account_type, last_logged_in) VALUES('admin', '03PeGuw1vSchw', '0321bdb42f0f148980cddb1ccaa2c3616dd78975464ea4233e7181b8cb510527f21ca574ed31d586526f21ba23a4d94831223861cbe3c3d4cfdfbf41d50cb9c6f67859dc51af6fc181b7c2b5b66e9bcab642c4ef94fc50904ecf245209599d34afc692dd53ba223a7f7be4c9bef240d3ae5f0b260df253d7', 'admin@whoborrow.com', 'admin', '2016-03-26 14:37:28.565');
INSERT INTO member (username, password, salt, email, account_type, last_logged_in) VALUES('admin1', 'ddwA/4471oMRQ', 'dd0bd2dac4732583860de762ad47c38c715fd91eaddc79b7b03c5dfed2741e01af29f2b0e999b75043415dcbaff389a15388d559090f17b5ab6b7687d3f8903e13693afeffeec0d0754a02496782d04e67852ca93af449d2d3f99f5b66332a8d3b5366f3a59c2305dd7f9958fb4bc234c4269a7534c78cc7', 'admin1@whoborrow.com', 'admin', '2016-03-20 14:37:28.565');
INSERT INTO member (username, password, salt, email, account_type, last_logged_in) VALUES('john', '12GZ89p1IhN4Q', '12f892d0f4fa5948d830cfe4e2d66dc737968e11141396535b3bb2a913835aed368fcfaa20adba27d2a4b79bff69a3dcdf6d3edc181f1545b91cf4451196f9cebf69155d5c8d0f007b1b34acfd31ed1a3941ab1752d59ba72fdb0ec152095e05bbdd1a079882dc591e78216e12a8ee002187d59df80f2575', 'john@whoborrow.com', 'member', '2016-03-22 18:37:28.565');
INSERT INTO member (username, password, salt, email, account_type, last_logged_in) VALUES('matthew', '00KkzUvIgETYY', '001a9856ba2b6b9d5568a1204a66a916c1d0fae263fa257733a102d1738a7f487c9d7a1d52b25aa22ac3decc43ffa34ef5c45aedd0f272e791dc25e4302eb64410d6909c40a57c2130569c4055483122b47c9ea3881853cb922aed148ab7a106040f9b6063a48ca869785c0cde9f3547f16bbaaf57972825', 'matthew@whoborrow.com', 'member', '2016-03-30 18:37:28.565');
INSERT INTO member (username, password, salt, email, account_type, last_logged_in) VALUES('oswell', '2cGbzsknc8m4A', '2ccedcd731f7a64029081721fdb5c16b8b7248bdb23e6cbacca48d01898e8aa64825a61b3674024287d91bfa44ec8eedd57de599a39e79fb35ba9730d2d06ecf61f196461b42026cddb4df47da962a6da2b83b3066d7f5d91bb5a631f7169ca24adf9826a2ebbee933ebb6726e805f292daeb7056fcc5f0e', 'oswell@whoborrow.com', 'member', '2016-03-30 18:37:28.565');
INSERT INTO member (username, password, salt, email, account_type, last_logged_in) VALUES('victor', '4bbqNJ2fryl8k', '4b5c09fa03ec943bda88f2d22e5fb64781d57c864b2920cf80544caf70c3a7cf8d030d88be19f699a82023014e442a49611184d33f41b1e55fb65408ec4bb9e40591b60abdede519f3869b0e420722fad0d572a27c78bc7e3e55ab6a9e740a0bdf56a5d441a522248896109420446b83fe8819b4b8e31028', 'victor@whoborrow.com', 'member', '2016-03-10 14:37:28.565');
INSERT INTO member (username, password, salt, email, account_type, last_logged_in) VALUES('jacky', '067bapqe0Mruk', '0660fe52d9c6136481f4d70336909c2e81b7411ba6bcbbdc535b148cc71e08567cf7443c206c8bf119f95f52e10ebc3ea5ce618163cd37d0a32b0e93b96ffa13e0e2aac8d06c6f2b7567406cb7b5e64651eaf00a9625d9bfa2243dff21577fa789b6a31e7a34284f8dbaf16581bb0bea8aeb0490ea0b737d', 'jacky@whoborrow.com', 'member', '2016-03-10 14:37:28.565');
INSERT INTO member (username, password, salt, email, account_type, last_logged_in) VALUES('jiajie', '1cNdjdUwB2VrE', '1c043f162a78a81243e189be589778184dab328a267f46eb1b0a9b40ccd4628ab1a2bfa8a73eb7f4f2bd4bfbd3edbcc87a495ca8545f264629317a91e6c3224215f0d07ba3674e674a9c3f5baec9d450ef6af951fd8c5fd51e64c075a9508ba0d33bc72f85e61593695d59446d60b31a04b4bb6e4285b7d6', 'jiajie@whoborrow.com', 'member', '2016-03-30 18:37:28.565');

/*
 * 		
 */

/*
 * Item		
 */

INSERT INTO item (item_name, owner, category, price, description, location) VALUES('Iphone 6S', 'oswell', 'Electronics', 1000, 'Very nice phone.', 'Singapore');
INSERT INTO item (item_name, owner, category, price, description, location) VALUES('Kindle 7', 'victor', 'Electronics', 75, 'Read your books on the go.', 'Singapore');
INSERT INTO item (item_name, owner, category, price, description, location) VALUES('Zergling Plush', 'jiajie', 'Entertainment', 30, 'Cuddly and nice to hug.', 'Singapore');
INSERT INTO item (item_name, owner, category, price, description, location) VALUES('Zara Dress Shirt', 'victor', 'Apparel & Accessories', 80, 'Size M. Wash before returning.', 'Singapore');
INSERT INTO item (item_name, owner, category, price, description, location) VALUES('Metal Black Wok', 'oswell', 'Home & Appliances', 25, 'Good heat retension.', 'Singapore');
INSERT INTO item (item_name, owner, category, price, description, location) VALUES('Unused baby shoes', 'oswell', 'Kids & Babies', 15, 'Never worn. Good for training kids.', 'Singapore');

/*
 * 		
 */

 /*
 * 	Loan Request (Test that message is newly added)	
 */

INSERT INTO loan_request (item_name, owner, borrower, date_start, date_end, status, price_offer) VALUES('Iphone 6S', 'oswell', 'victor', '2015-04-04', '2015-04-06', 'pending', 1000);

/*
 * 		
 */

  /*
 * 	Review
 */

INSERT INTO review (reviewer, reviewee, content, has_like) VALUES('oswell', 'victor', 'Good lender. Will deal again.', 1);
INSERT INTO review (reviewer, reviewee, content, has_like) VALUES('matthew', 'victor', 'Item in poor conditon.', 0);
INSERT INTO review (reviewer, reviewee, content, has_like) VALUES('jiajie', 'victor', 'Lender was prompt and punctual.', 1);
INSERT INTO review (reviewer, reviewee, content, has_like) VALUES('jacky', 'oswell', 'Item is in good condition.', 1);

/*
 * 		
 */

 