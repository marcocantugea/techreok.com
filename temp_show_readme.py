with open('README.md', 'r', encoding='utf-8') as f:
    for i, line in enumerate(f, 1):
        print(f"{i:04} {line.rstrip()}" )
