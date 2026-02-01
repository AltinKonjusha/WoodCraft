
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE order_items;
TRUNCATE TABLE orders;
TRUNCATE TABLE cart_items;
TRUNCATE TABLE carts;
TRUNCATE TABLE messages;
TRUNCATE TABLE products;
TRUNCATE TABLE users;
SET FOREIGN_KEY_CHECKS = 1;

INSERT INTO users (name, email, password, role) VALUES
('Admin User', 'admin@example.com', '$2y$10$abcdefghijklmnopqrstuv', 'admin'),
('John Doe', 'john@example.com', '$2y$10$abcdefghijklmnopqrstuv', 'user'),
('Jane Smith', 'jane@example.com', '$2y$10$abcdefghijklmnopqrstuv', 'user');

INSERT INTO products (name, description, price, stock, image) VALUES
('Oak Serving Board', 'Handcrafted oak serving board.', 25.00, 10, NULL),
('Maple Cutting Board', 'Durable maple cutting board.', 30.00, 15, NULL),
('Walnut Cheese Board', 'Elegant walnut cheese board.', 45.00, 8, NULL),
('Cherry Wood Spoon', 'Smooth cherry wood spoon.', 10.00, 20, NULL),
('Bamboo Utensil Set', 'Eco-friendly bamboo utensils.', 18.00, 25, NULL);

INSERT INTO carts (user_id, status) VALUES
(2, 'active'),
(3, 'active');

INSERT INTO cart_items (cart_id, product_id, quantity) VALUES
(1, 1, 2),
(1, 3, 1),
(2, 2, 1);

INSERT INTO messages (user_id, name, email, subject, message) VALUES
(2, 'John Doe', 'john@example.com', 'Order Inquiry', 'When will my order arrive?'),
(3, 'Jane Smith', 'jane@example.com', 'Product Question', 'Is the walnut board food safe?');

INSERT INTO orders (user_id, total, status) VALUES
(2, 70.00, 'pending'),
(3, 30.00, 'paid');

INSERT INTO order_items (order_id, product_name, product_price, quantity) VALUES
(1, 'Oak Serving Board', 25.00, 2),
(1, 'Walnut Cheese Board', 45.00, 1),
(2, 'Maple Cutting Board', 30.00, 1);
