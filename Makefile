.PHONY: commit push auto serve

# List of short commit messages
commit_messages := "JEEBLOG: " \
                   "Hello world! " \
                   "Ez As F => " \
                   "Who r u?" \
                   "Forgive me :) " \
                   "Love life" \
                   "Jancok" \
                   "Our dream" \
                   "Merge love" \
                   "Heart Attack"

# List of random icons
icons := "🚀" \
         "🛠️" \
         "🔧" \
         "📝" \
         "💻" \
         "🌟" \
         "🔥" \
         "👨‍💻" \
         "👩‍💻" \
         "💡" \
         "🎯" \
         "✨" \
         "📚" \
         "🔍" \
         "⚙️" \
         "💡" \
         "🌐" \
         "🔗" \
         "📌" \
         "🚦"

# Select a random commit message and icon
commit_message := $(shell echo $(commit_messages) | tr ' ' '\n' | shuf -n 1)
icon := $(shell echo $(icons) | tr ' ' '\n' | shuf -n 1)

commit:
	@echo "Committing with message: $(icon) $(commit_message)"
	@git add .
	@git commit -m "$(icon) $(commit_message)"

push:
	@git push origin main

auto: commit push

serve:
	@echo "[!] Running development mode in: http://localhost:8888 ..."
	@php -S localhost:8888
