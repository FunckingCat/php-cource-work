INSERT INTO  Users (email, username, password)
VALUES
    ('admin@mail.com', 'admin', 'admin'),
    ('artur@mail.com', 'Artur', 'artur123'),
    ('pavel@mail.com', 'Pavel', 'pavel123'),
    ('anatol@mail.com', 'Anatol', 'anatol123'),
    ('edmund@mail.com', 'Edmund', 'edmund123'),
    ('torsten@mail.com', 'Torsten', 'torsten123');

INSERT INTO Hashtags (name)
VALUES
    ('context'),
    ('collection'),
    ('uncle'),
    ('moment'),
    ('farmer'),
    ('fishing'),
    ('newspaper'),
    ('resolution');

INSERT INTO Channels (name, description, owner)
VALUES
    ('Midnight', 'nt pleasure? On the other hand, we denounce with righteous indignation and dislike men who are so be', 2),
    ('Significance', 'pleasure rationally encounter consequences that are', 3),
    ('Organization', 'ever undertakes laborious physical exercise, ex', 4),
    ('Recognition', ' rejects, dislikes, or avoids pleasure itself, because it is pleasure', 5),
    ('Platform', 'f itself, because it is pain, but because occasionally circumstances occur', 6);

INSERT INTO Channels (name, description, trusted, owner)
VALUES
    ('Climate', 'But I must explain to you how all this mistaken idea', true, 4),
    ('Medicine', 'here anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious phys', true, 5),
    ('Definition', 'pleasure and praising pain was born and I will give you a ', true, 6);

INSERT INTO Topics (title, description)
VALUES
    ('Lady', 'Welcome to the website. If youre here, youre likely looking to find random words. '),
    ('Initiative', 'Random Word Generator is the perfect tool to help you do this.'),
    ('Story', 'While this tool isn''t a word creator'),
    ('Tennis', 'It is a word generator that will generate random words for a variety of activities or uses.'),
    ('Library', 'Even better, it allows you to adjust the parameters of the random words to best fit your needs.');

INSERT INTO TopicHashtags (hashtag, channel)
VALUES
    (1, 1),
    (1, 2),
    (1, 3),
    (2, 4),
    (2, 5),
    (2, 6),
    (3, 7),
    (3, 8),
    (3, 1),
    (4, 2),
    (4, 3),
    (4, 4),
    (5, 5),
    (5, 6),
    (5, 7),
    (6, 8),
    (6, 1),
    (6, 2),
    (7, 3),
    (7, 4),
    (7, 5),
    (8, 6),
    (8, 7),
    (8, 8);