-- 创建数据库
CREATE DATABASE IF NOT EXISTS photo;
USE photo;

-- 创建照片表
CREATE TABLE IF NOT EXISTS photo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    title VARCHAR(100) NOT NULL,
    location VARCHAR(100),
    description TEXT,
    photo VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 插入一些示例数据
INSERT INTO photo (filename, title, location, description, photo) VALUES
('sample1.jpg', '美丽的风景', '东京', '这是一张美丽的风景照片', 'uploads/sample1.jpg'),
('sample2.jpg', '城市夜景', '大阪', '城市的夜晚景色', 'uploads/sample2.jpg'); 