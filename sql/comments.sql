-- 创建评论表
CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    photo_id INT NOT NULL,
    commenter_name VARCHAR(100) NOT NULL,
    comment_text TEXT NOT NULL,
    comment_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (photo_id) REFERENCES photo(id) ON DELETE CASCADE
);

-- 插入测试评论数据
INSERT INTO comments (photo_id, commenter_name, comment_text) VALUES
(2, '田中太郎', 'とても美しい夜景ですね！'),
(2, '佐藤花子', '大阪の夜景は最高です'),
(3, '山田次郎', '東京の素晴らしい写真ですね'),
(3, '鈴木美咲', 'アジアの大都市の魅力が伝わってきます'),
(4, '高橋健', '横浜も住みやすそうな街ですね'); 