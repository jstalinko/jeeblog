.PHONY: commit push auto serve

# List of quotes for commit messages
quotes := "Keep it simple, stupid." \
          "First, solve the problem. Then, write the code." \
          "Experience is the name everyone gives to their mistakes." \
          "In order to be irreplaceable, one must always be different." \
          "Java is to JavaScript what car is to Carpet." \
          "Sometimes it pays to stay in bed on Monday, rather than spending the rest of the week debugging Monday’s code." \
          "Code is like humor. When you have to explain it, it’s bad." \
          "Fix the cause, not the symptom." \
          "Optimism is an occupational hazard of programming: feedback is the treatment." \
          "When to use iterative development? You should use iterative development only on projects that you want to succeed." \
          "Simplicity is the soul of efficiency." \
          "Before software can be reusable it first has to be usable." \
          "The only way to do great work is to love what you do." \
          "Code that works at the end of the day is good code." \
          "Testing leads to failure, and failure leads to understanding." \
          "Programming is not about typing, it's about thinking." \
          "If you think your users are idiots, only idiots will use it." \
          "Programming today is a race between software engineers striving to build bigger and better idiot-proof programs, and the universe trying to produce bigger and better idiots. So far, the universe is winning." \
          "Don’t worry if it doesn’t work right. If everything did, you’d be out of a job." \
          "Any fool can write code that a computer can understand. Good programmers write code that humans can understand." \
          "Without requirements or design, programming is the art of adding bugs to an empty text file."

# Select a random quote from the list
commit_message := $(shell echo ${quotes} | tr ' ' '\n' | shuf -n 1)

commit:
	@echo "Committing with message: $(commit_message)"
	@git add .
	@git commit -m "$(commit_message)"

push:
	@git push origin main

auto: commit push

serve:
	@echo "[!] Running development mode in : http://localhost:8888 ..."
	@php -S localhost:8888
