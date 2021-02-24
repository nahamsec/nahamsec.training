CREATE database nahamsec;
USE nahamsec;

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `contents` text NOT NULL,
  `created_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `article` (`id`, `title`, `contents`, `created_at`) VALUES
(1, 'How to get started in hacking', ' Mauris et tempus purus. Vivamus a eros pulvinar, tristique massa sit amet, molestie sem. Aenean ullamcorper ligula eget nulla gravida, in congue metus ultricies. Nulla quis nisl nulla. Nunc pretium iaculis posuere. Donec ac dignissim tortor, sit amet rhoncus felis. Praesent a diam magna. Etiam vestibulum nisi vel aliquam eleifend. In hac habitasse platea dictumst.\n\nNunc vel pellentesque nulla. Sed tempor risus volutpat arcu dignissim porttitor. Suspendisse scelerisque augue lectus, at pharetra lectus hendrerit ut. Morbi vel leo semper, egestas est et, lobortis mauris. Nullam sit amet rutrum lectus. Phasellus volutpat finibus tristique. Fusce et felis metus. Suspendisse in risus nec nisi aliquet consequat. Phasellus fringilla viverra iaculis. Maecenas ultrices quam vel velit pretium, et tristique nisl fermentum. Curabitur eu volutpat risus. Suspendisse ac viverra est, et rutrum diam. Etiam accumsan massa id velit bibendum malesuada. Nulla elit urna, lobortis tempus lorem ut, luctus tincidunt felis. Praesent mattis erat id orci volutpat, at pharetra purus ullamcorper. ', '13th May 2020'),
(2, 'The meaning of life', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tincidunt nec ipsum et lacinia. Donec semper orci vitae urna bibendum mollis. Fusce ultrices bibendum interdum. Nulla fermentum at diam id rhoncus. Aenean convallis turpis risus. Praesent lorem augue, elementum vitae interdum ac, vehicula a diam. Ut mauris neque, malesuada sit amet ex nec, ornare ultrices libero. Curabitur egestas facilisis justo sed tempor.\n\nPellentesque eget orci at ante gravida blandit. Nullam turpis eros, tristique vehicula efficitur eget, ullamcorper ac metus. Cras elementum libero leo, nec sagittis diam commodo at. Vestibulum sed felis a lorem viverra congue a dapibus ex. In ut sodales ante. Etiam a nibh dui. Quisque tempus, eros sed dictum facilisis, sem nunc efficitur sem, a maximus mi ex et urna. Curabitur vitae quam odio. Donec viverra mattis augue sit amet aliquam. Morbi ac sem vulputate, dapibus eros sit amet, porttitor nulla. Vestibulum posuere nunc purus, id mattis arcu laoreet posuere. Donec non elit lectus. Sed tristique aliquet tortor ac venenatis. Donec pellentesque vel enim eget rhoncus. Nullam commodo, libero ut ultrices interdum, nibh magna pharetra elit, in euismod tellus nulla a neque. Maecenas venenatis, mi eget mattis euismod, diam mauris ultrices libero, nec dignissim nisi massa in tellus. ', '22nd May 2020');

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'p4$$w0rd');

ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


CREATE USER 'nahamsec'@'%' IDENTIFIED WITH mysql_native_password BY 'GtWKcpX3MAmCviGC';
GRANT SELECT ON `nahamsec`.* TO 'nahamsec'@'%';
FLUSH PRIVILEGES;

