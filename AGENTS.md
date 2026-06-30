# DevXCloud — Agent Usage Guide

This project uses AI agents from [agency-agents](https://github.com/msitarzewski/agency-agents)
via OpenCode's subagent system. Activate any agent with `@agent-name`.

## Available Agents

### Engineering (Core Team)
| Agent | When to Use |
|-------|-------------|
| `@frontend-developer` | UI implementation, performance optimization, component refactoring |
| `@backend-architect` | API design, database architecture, Laravel service layer |
| `@codebase-onboarding-engineer` | New team member onboarding, codebase exploration |
| `@senior-developer` | Complex implementations, advanced patterns, Laravel/Livewire |
| `@code-reviewer` | PR reviews, code quality gates, security review |
| `@software-architect` | Architecture decisions, trade-off analysis, system design |
| `@ai-engineer` | AI integration, LLM features, Gemini/OpenAI integration |
| `@multiagent-systems-architect` | Multi-agent pipeline design, agent coordination |
| `@database-optimizer` | Schema design, query optimization, indexing |
| `@devops-automator` | CI/CD, deployment, Docker, infrastructure |
| `@prompt-engineer` | LLM prompt design and optimization |
| `@minimal-change-engineer` | Minimum-viable diffs — fix only what's asked |
| `@rapid-prototyper` | Quick prototypes, proof-of-concepts |
| `@git-workflow-master` | Git workflows, rebase strategies, conflict resolution |
| `@technical-writer` | Documentation, README, API docs |
| `@cms-developer` | CMS integration, content architecture |

### Testing & QA
| Agent | When to Use |
|-------|-------------|
| `@api-tester` | API validation, endpoint testing |
| `@reality-checker` | Production readiness, quality gates |
| `@evidence-collector` | Screenshot-based QA, visual verification |
| `@performance-benchmarker` | Load testing, performance optimization |
| `@test-results-analyzer` | Test failure analysis, coverage gaps |

### Security
| Agent | When to Use |
|-------|-------------|
| `@security-architect` | Threat modeling, system security review |
| `@application-security-engineer` | Code-level vulnerability scanning |
| `@penetration-tester` | Security testing, exploit identification |
| `@threat-detection-engineer` | Anomaly detection, monitoring |
| `@threat-intelligence-analyst` | CVE tracking, security advisory research |

### Design
| Agent | When to Use |
|-------|-------------|
| `@ui-designer` | Visual design, component polish |
| `@ux-architect` | Layout structure, CSS systems |
| `@ux-researcher` | User research, usability testing |
| `@accessibility-auditor` | WCAG compliance, a11y improvements |
| `@brand-guardian` | Brand consistency, design tokens |
| `@visual-storyteller` | Hero sections, animations, illustrations |

### Specialized
| Agent | When to Use |
|-------|-------------|
| `@whimsy-injector` | Micro-interactions, delightful UX details |
| `@workflow-optimizer` | Process optimization, automation |
| `@tool-evaluator` | Library/tool research, comparison |
| `@incident-responder` | Production incidents, hotfixes |
| `@incident-response-commander` | Incident coordination, post-mortems |
| `@persona-walkthrough-specialist` | User journey testing, edge case discovery |

## Workflow

```
1. Pick a task from the roadmap
2. Activate relevant agent: @agent-name
3. Agent provides specialized workflow + code
4. Review via @code-reviewer
5. Mark complete
```

## Pending Implementation

### Chatbot — "Connect me to an agent" detection
**When user types agent-connect keywords, implement in `ChatController@reply()`:**

1. **Pre-check keywords:** `agent|human|talk to someone|connect|baat karni hai|speak to person|team se baat|kisi se baat`

2. **Bot reply:**
   > "Let me connect you with our team. Please share more details about your requirement so we can assist you better."

3. **Show 3 buttons:** `Get Personalized Guidance | Book Discovery Call | Explore Services` (existing fallback options)

4. **Existing flow untouched** — form submit → ticket create → agent connects.

---

### Chatbot — Message length limit
**In `ChatController@reply()` line 29:** change `300` → `2000`

---

## Agent Locations

- Source agents: `D:\laragon\www\agency-agents\`
- OpenCode agents: `.opencode/agents/`
- To add more agents: run convert from agency-agents root
