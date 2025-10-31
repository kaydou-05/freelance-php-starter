INSERT INTO users (name, email, password, role) VALUES
('مستقل 1','freelancer1@example.com','password','freelancer'),
('عميل 1','client1@example.com','password','client');

INSERT INTO services (title, description, category, price, freelancer_id, freelancer_name, rating) VALUES
('تطوير موقع عصري','تصميم وتطوير موقع احترافي متجاوب','برمجة',300,'1','مستقل 1',4.8),
('تصميم شعار احترافي','شعار مميز للشركات والمشاريع الصغيرة','تصميم',50,'1','مستقل 1',4.6);
